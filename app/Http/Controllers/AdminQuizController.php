<?php

namespace App\Http\Controllers;
use App\Models\QuizAttempt;
use App\Models\Training;
use Illuminate\Http\Request;

class AdminQuizController extends Controller
{
    public function index(Request $request)
    {
        $query = QuizAttempt::with([
            'user',
            'quiz.training',
            'userAnswers.answer'
        ])->latest();//latest() = trie par date de création décroissante (les plus récents en premier).

        // Filtres
        if ($request->filled('training_id')) {
            $query->whereHas('quiz', fn($q) => $q->where('training_id', $request->training_id));
        }

        if ($request->filled('quiz_type')) {
            $query->whereHas('quiz', fn($q) => $q->where('type', $request->quiz_type));
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        if ($request->filled('status')) {
            $query->where('passed', $request->status === 'passed');
        }

        if ($request->filled('cheat_detected')) {
            $query->where('tab_switches', '>', 3);
        }

        return view('admin.attempts-detail', [
            'attempts' => $query->paginate(15),
            'trainings' => Training::all(),
            'quizTypes' => [
                'final' => 'Quiz Final',
                'placement' => 'Test de Niveau'
            ]
        ]);
    }

    /**
     * Affiche le détail d'une tentative spécifique
     */
    public function show(QuizAttempt $attempt)
    {
        $attempt->load([
            'user',
            'quiz.training',
            'userAnswers.answer',
            'userAnswers.question.correctAnswers'
        ]);

        return view('admin.attempt-single', compact('attempt'));
    }
}
