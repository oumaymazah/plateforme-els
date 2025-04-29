<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quiz_id' => 'required|exists:quizzes,id',
            'question_text' => 'required|string|max:1000',
            'points' => 'required|integer|min:1',
            'answers' => 'required|array|min:2',
            'answers.*' => 'required|string|max:255',
            'correct_answers' => 'required|array|min:1',
            'correct_answers.*' => 'required|integer|min:1'
        ], [
            // Messages personnalisés
            'quiz_id.required' => 'Veuillez sélectionner un quiz.',
            'quiz_id.exists' => 'Le quiz sélectionné n\'existe pas.',

            'question_text.required' => 'Le texte de la question est obligatoire.',
            'question_text.string' => 'Le texte de la question doit être une chaîne de caractères.',
            'question_text.max' => 'Le texte de la question ne doit pas dépasser 1000 caractères.',

            'points.required' => 'Veuillez indiquer le nombre de points pour cette question.',
            'points.integer' => 'Le nombre de points doit être un nombre entier.',
            'points.min' => 'Le nombre de points doit être au moins 1.',

            'answers.required' => 'Veuillez fournir des réponses.',
            'answers.array' => 'Les réponses doivent être présentées sous forme de liste.',
            'answers.min' => 'Vous devez fournir au moins 2 réponses.',
            'answers.*.required' => 'Chaque réponse est obligatoire.',
            'answers.*.string' => 'Chaque réponse doit être une chaîne de caractères.',
            'answers.*.max' => 'Chaque réponse ne doit pas dépasser 255 caractères.',

            'correct_answers.required' => 'Veuillez indiquer au moins une réponse correcte.',
            'correct_answers.array' => 'Les réponses correctes doivent être présentées sous forme de liste.',
            'correct_answers.min' => 'Vous devez indiquer au moins une réponse correcte.',
            'correct_answers.*.required' => 'Chaque indice de réponse correcte est obligatoire.',
            'correct_answers.*.integer' => 'Les indices des réponses correctes doivent être des nombres entiers.',
            'correct_answers.*.min' => 'Les indices des réponses correctes doivent être au moins 1.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('show_modal', 'addQuestionModal');
        }

        $question = Question::create([
            'quiz_id' => $request->quiz_id,
            'question_text' => $request->question_text,
            'points' => $request->points
        ]);

        foreach ($request->answers as $index => $answerText) {
            $realIndex = $index + 1;
            Answer::create([
                'question_id' => $question->id,
                'answer_text' => $answerText,
                'is_correct' => in_array($realIndex, $request->correct_answers) // Vérifie si l'index est dans le tableau des réponses correctes
            ]);
        }

        return redirect()->back()->with('success', 'Question ajoutée avec succès!');
    }
    public function edit(Question $question)
    {
        $question->load('answers');
        return response()->json([
            'question' => $question,
            'answers' => $question->answers
        ]);
    }

    public function update(Request $request, Question $question)
    {
        $validator = Validator::make($request->all(), [
            'question_text' => 'required|string|max:1000',
            'points' => 'required|integer|min:1',
            'answers' => 'required|array|min:2',
            'answers.*.text' => 'required|string|max:255',
            'answers.*.id' => 'required|exists:answers,id',
            'correct_answer' => 'required|exists:answers,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $question->update([
            'question_text' => $request->question_text,
            'points' => $request->points
        ]);

        foreach ($request->answers as $answerData) {
            Answer::where('id', $answerData['id'])->update([
                'answer_text' => $answerData['text'],
                'is_correct' => $answerData['id'] == $request->correct_answer
            ]);
        }

        return response()->json(['success' => 'Question mise à jour avec succès!']);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->back()->with('success', 'Question supprimée avec succès!');
    }
}
