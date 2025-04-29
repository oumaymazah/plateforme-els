<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Training;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class FeedbackController extends Controller
{


    public function store(Request $request)
    {
        // 1. Validation des données
        $validatedData = $this->validate($request, [
            'training_id' => 'required|exists:trainings,id',
            'quiz_attempt_id' => 'required|exists:quiz_attempts,id',
            'rating_count' => 'required|integer|between:1,5',

        ]);

        // 2. Vérification que la tentative de quiz appartient bien à l'utilisateur
        $attempt = QuizAttempt::findOrFail($validatedData['quiz_attempt_id']);

        if ($attempt->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée');
        }

        // 3. Vérification qu'il n'y a pas déjà un feedback pour cette tentative
        if (Feedback::where('quiz_attempt_id', $validatedData['quiz_attempt_id'])->exists()) {
            return back()->with('error', 'Vous avez déjà soumis un feedback pour ce quiz.');
        }

        // 4. Création du feedback
        Feedback::create([
            'user_id' => Auth::id(),
            'training_id' => $validatedData['training_id'],
            'quiz_attempt_id' => $validatedData['quiz_attempt_id'],
            'rating_count' => $validatedData['rating_count'],
            
        ]);

        // 5. Redirection avec message de succès
        return back()->with('success', 'Merci pour votre feedback ! Votre évaluation a bien été enregistrée.');
    }


}
