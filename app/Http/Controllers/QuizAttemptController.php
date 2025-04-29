<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Certification;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Str;
class QuizAttemptController extends Controller
{
    public function start(Quiz $quiz)
{
    if (!auth()->user()->hasRole('etudiant')) {
        return redirect()->back()->with('error', 'Seuls les étudiants peuvent passer ce quiz.');
    }
    if (!$quiz->is_published) {
        return redirect()->back()->with('error', 'Ce quiz n\'est pas disponible pour le moment.');
    }
    // Vérifier si l'utilisateur a déjà tenté ce quiz
    $previousAttempt = QuizAttempt::where('user_id', Auth::id())
        ->where('quiz_id', $quiz->id)
        ->where('completed', true)
        ->first();

    if ($previousAttempt) {
        return redirect()->route('trainings.show', $quiz->training_id)
            ->with('error', 'Vous avez déjà passé ce quiz. Une seule tentative est autorisée.');
    }

    // Vérifier s'il y a une tentative en cours
    $currentAttempt = QuizAttempt::where('user_id', Auth::id())
        ->where('quiz_id', $quiz->id)
        ->where('completed', false)
        ->first();

    if ($currentAttempt) {
        // Reprendre la tentative en cours
        return redirect()->route('quizzes.attempt', $currentAttempt->id);
    }

    // Créer une nouvelle tentative
    $attempt = QuizAttempt::create([
        'user_id' => Auth::id(),
        'quiz_id' => $quiz->id,
        'started_at' => now(),
        'score' => 0,
        'passed' => false,
        'completed' => false
    ]);

    return redirect()->route('quizzes.attempt', $attempt->id);
}


    public function attempt(QuizAttempt $attempt)
    {
        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        if ($attempt->completed) {
            return redirect()->route('quizzes.result', $attempt->id);
        }

        $quiz = $attempt->quiz;
        //charger les questions et les réponses de manière aléatoire
        $questions = $quiz->questions()->with(['answers' => function($query) {
            $query->inRandomOrder();
        }])->inRandomOrder()->get();

        $currentQuestion = $questions->first();
        $timeLeft = $attempt->calculateTimeLeft();

        return view('quizzes.attempt', compact('attempt', 'quiz', 'questions', 'currentQuestion', 'timeLeft'));
    }

    public function answer(Request $request, QuizAttempt $attempt)
    {
        if ($attempt->user_id !== Auth::id() || $attempt->completed) {
            abort(403);
        }

        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_id' => 'required|exists:answers,id'
        ]);

        // $question = Question::find($validated['question_id']);
        // $answer = Answer::find($validated['answer_id']);

        $answer = Answer::with('question')->find($validated['answer_id']);
        $question = $answer->question;
        UserAnswer::create([
            'attempt_id' => $attempt->id,
            'question_id' => $question->id,
            'answer_id' => $answer->id,
            'is_correct' => $answer->is_correct
        ]);

        // Calculer le score actuel
        $correctAnswers = UserAnswer::where('attempt_id', $attempt->id)
            ->where('is_correct', true)
            ->count();

        $attempt->update(['score' => $correctAnswers]);

        $nextQuestion = $attempt->quiz->questions()
            ->whereNotIn('id', UserAnswer::where('attempt_id', $attempt->id)->pluck('question_id'))
            ->inRandomOrder()
            ->first();

        if (!$nextQuestion) {
            return $this->finishAttempt($attempt);
        }

        return redirect()->route('quizzes.attempt', $attempt->id);
    }
    protected function calculateScore(QuizAttempt $attempt)
    {
        $correctAnswers = UserAnswer::where('attempt_id', $attempt->id)
            ->where('is_correct', true)
            ->count();

        $totalQuestions = $attempt->quiz->questions()->count();

        if ($attempt->quiz->isFinalQuiz()) {
            // Convertir le score sur 20 points
            return round(($correctAnswers / max(1, $totalQuestions)) * 20, 1);
        } else {
            // Pour le test de niveau, on garde le nombre brut
            return $correctAnswers;
        }
    }

        protected function createCertificate(QuizAttempt $attempt)
    {
        $certificateNumber = 'CERT-' . now()->format('Ymd') . '-' . strtoupper(Str::random(5));

        Certification::create([
            'user_id' => $attempt->user_id,
            'training_id' => $attempt->quiz->training_id,
            'obtained_date' => now(),
            'status' => 'Délivrée',
            'certificate_number' => $certificateNumber
        ]);
    }

    public function finishAttempt(QuizAttempt $attempt)
    {
        $score = $this->calculateScore($attempt);
        $passed = $this->determinePassStatus($attempt, $score);

        $attempt->update([
            'score' => $score,
            'completed' => true,
            'finished_at' => now(),
            'passed' => $passed
        ]);

        // Création conditionnelle du certificat
        if ($attempt->quiz->isFinalQuiz() && $passed) {
            $this->createCertificate($attempt);
        }

        return redirect()->route('quizzes.result', $attempt->id);
    }
        public function result(QuizAttempt $attempt)
        {
            if ($attempt->user_id !== Auth::id()) {
                abort(403);
            }

            $quiz = $attempt->quiz;
            $userAnswers = $attempt->userAnswers()->with(['question', 'answer'])->get();
            $level = $this->determineLanguageLevel($attempt);

            return view('quizzes.result', compact('attempt', 'quiz', 'userAnswers', 'level'));
        }

        public function tabSwitch(QuizAttempt $attempt)
        {
            $newTabSwitches = $attempt->tab_switches + 1;
            $attempt->update(['tab_switches' => $newTabSwitches]);

            if ($newTabSwitches > 3) {
                $attempt->update(['completed' => true]);
                return response()->json(['force_submit' => true]);
            }

            return response()->json(['tab_switches' => $newTabSwitches]);
        }

        protected function determinePassStatus(QuizAttempt $attempt, $score = null)
    {
        if ($attempt->quiz->isPlacementTest()) {
            return true; // Toujours "passé"
        }

        $score = $score ?? $attempt->score;
        return $score >= $attempt->quiz->passing_score;
    }


        protected function determineLanguageLevel(QuizAttempt $attempt)
    {
        if (!$attempt->quiz->isPlacementTest()) {
            return null;
        }

        $score = $attempt->score;
        $level = null;

        // Détermination du niveau selon les critères spécifiés
        if ($score <= 20) {
            $level = 'A1 – débutant';
        } elseif ($score <= 35) {
            $level = 'A2 – faux débutant';
        } elseif ($score <= 60) {
            $level = 'B1 – intermédiaire';
        } elseif ($score <= 80) {
            $level = 'B2 – avancé';
        } elseif ($score <= 90) {
            $level = 'C1 – courant';
        } else {
            $level = 'C2 – maîtrise';
        }

        // Sauvegarder le niveau dans la tentative
        $attempt->update(['level' => $level]);

        return $level;
    }

}
