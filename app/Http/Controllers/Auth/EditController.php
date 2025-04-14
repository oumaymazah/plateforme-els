<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;
class EditController extends Controller
{
    //page de parametre
    public function index()
    {
        $user = Auth::user();
        return view('admin.apps.profile.parametreCompte', compact('user'));
    }
    //page de modification de profile
    public function edit()
    {
        $user = Auth::user();
        return view('admin.apps.profile.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $messages = [
            'phone.phone' => 'Le numéro de téléphone doit être valide pour la Tunisie.',
        ];

        $request->validate([
            'name' => 'string|max:255',
            'lastname' => 'string|max:255',
            'phone' => 'phone:TN',
        ], $messages);

        $user = Auth::user();
        $countryCode = '+216';
        $localNumber = $request->input('phone');
        $fullPhoneNumber = $countryCode . ' ' . $localNumber;

        $formattedPhoneNumber = PhoneNumber::make($fullPhoneNumber, 'TN')->formatE164();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->phone = $formattedPhoneNumber;
        $user->save();

        return response()->json(['message' => 'Votre profil a été mis à jour avec succès.'], 200);
    }
    //page de modification de compte(email+password)
    public function updateCompte()
    {
        return view('admin.apps.profile.editCompte');
    }
    //pagee de modification de l'email
    public function updateEmail(){
        $user = Auth::user();
        return view('admin.apps.profile.editEmail', compact('user'));
    }

public function checkEmailAvailability(Request $request)
{
    $messages = [
        'email.required' => 'Une adresse e-mail valide est requise pour mettre à jour votre compte.',
    ];
    $request->validate([
        'email' => 'required|string|email|max:255',
    ],$messages);

    $user = Auth::user();

    // Vérifier si l'email est différent de l'email actuel
    if ($request->email === $user->email) {
        return response()->json(['error' => 'Veuillez entrer une adresse email différente de votre adresse actuelle.'], 422);
    }

    // Vérifier si l'email est unique
    $existingUser = User::where('email', $request->email)
        ->where('id', '!=', $user->id)
        ->first();

    if ($existingUser) {
        return response()->json(['error' => 'Cet email est déjà utilisé par un autre utilisateur.'], 422);
    }

    return response()->json(['success' => true], 200);
}



    public function verifyPassword(Request $request) {
        $request->validate([
            'password' => 'required|string',
            'email' => 'required|string|email|max:255',
        ]);

        $user = Auth::user();

        // Protection contre les attaques par force brute
        $key = 'password_attempts_' . $user->id;
        $failedAttempts = Cache::get($key, 0);

        // Si l'utilisateur a été débloqué récemment et qu'il était auparavant bloqué,
        // réinitialiser le compteur de tentatives
        if ($user->status === 'active' && $failedAttempts >= 3) {
            Cache::forget($key);
            $failedAttempts = 0;
        }

        if ($failedAttempts >= 3) {
            // Bloquer l'utilisateur en changeant son statut
            $user->status = 'inactive';
            $user->save();

            // Déconnecter l'utilisateur
            Auth::logout();

            return response()->json([
                'error' => 'Compte bloqué. Veuillez contacter l\'administrateur.',
                'redirect' => route('blocked.account')
            ], 403);
        }

        // Vérifier le mot de passe
        if (!Hash::check($request->password, $user->password)) {
            // Incrémenter le compteur d'échecs et le stocker pour 10 minutes
            Cache::put($key, $failedAttempts + 1, now()->addMinutes(10));
            return response()->json([
                'error' => 'Le mot de passe est incorrect. Tentative ' . ($failedAttempts + 1) . '/3',
                'attempts' => $failedAttempts + 1
            ], 422);
        }

        // Si le mot de passe est correct, réinitialiser le compteur
        Cache::forget($key);

        // Si le mot de passe est correct, on stocke l'email pour la vérification
        session(['new_email' => $request->email]);

        return response()->json(['success' => true], 200);
    }
    public function pageDeBlockage()
    {
        return view('auth.blocked');
    }

    //entrer le nouveau email et envoyer le code de verification
    public function sendEmailVerificationCode(Request $request)
    {
        $user = Auth::user();
        $email = session('new_email');

        if (!$email) {
            return response()->json(['error' => 'Une erreur est survenue. Veuillez réessayer.'], 422);
        }

        $verificationCode = Str::random(6);
        \Log::info('Code de vérification: ' . $verificationCode);

        session(['email_verification_code' => $verificationCode]);

        try {
            Mail::to($email)->send(new EmailVerificationMail($user, $verificationCode));
        } catch (\Exception $e) {
            \Log::error('Erreur envoi email: ' . $e->getMessage());
            return response()->json(['error' => 'Une erreur est survenue lors de l\'envoi de l\'e-mail de validation.'], 422);
        }

        return response()->json(['success' => true], 200);
    }

    //affichier la page de validation de code
    public function validateCode(){
        return view('admin.apps.profile.validateCode');
    }
    //entrer le code de verification et valider le nouveau email
    public function verifyAndUpdateEmail(Request $request)
    {
        $request->validate([
            'verification_code' => 'required',
        ]);

        if ($request->verification_code != session('email_verification_code')) {
            return response()->json(['error' => 'Le code de validation est incorrect.'], 422);
        }

        $user = Auth::user();
        $user->email = session('new_email');
        $user->save();

        session()->forget(['email_verification_code', 'new_email']);
        return response()->json(['message' => 'Votre email a été mis à jour avec succès.'], 200);
    }
    //affichier la page de modification de mot de passe
    public function editPassword()
    {
        return view('admin.apps.profile.editPassword');
    }

    //entrer l'ancien et le nouveau mot de passe et confirmer le nouveau mot de passe
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['error' => 'Le mot de passe actuel est incorrect.'], 422);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Votre mot de passe a été mis à jour avec succès.'], 200);
    }

}
