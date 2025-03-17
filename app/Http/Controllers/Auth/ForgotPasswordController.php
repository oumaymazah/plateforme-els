<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPasswordMail;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */



    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetCode(Request $request){
        $messages = [
            'email.exists' => 'Aucun compte n\'est associé à cette adresse e-mail.',

        ];
        $request->validate([
            'email' =>'required|email|exists:users,email',
        ],$messages);
        $user=User::where('email',$request->email)->first();

        $code=Str::random(6);
        session(['reset_email' => $user->email, 'reset_code' => $code]);

        $user->update(
            ['code_reset_password' => $code]
        );
        try {
            Mail::to($user->email)->send(new ResetPasswordMail($user, $code));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'envoi de l\'e-mail de validation.');
        }
        return redirect()->route('reset.password.form')->with('success', 'Un code de vérification a été envoyé à votre email.');

    }

    public function showVerifyForm()
    {
        return view('auth.verify-code');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string|in:' . session('reset_code'),
        ]);

        // Supprimer le code après vérification
        session(['reset_verified' => true]);

        return redirect()->route('password.reset.form');
    }

    public function showResetForm()
    {
        if (!session('reset_verified')) {
            return redirect()->route('reset.password.form')->withErrors('Accès non autorisé.');
        }

        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', session('reset_email'))->first();
        \Log::error('password modifié ' .  $user);
        $user->update(['password' => bcrypt($request->password)]);

        // Supprimer les sessions de récupération
        session()->forget(['reset_email', 'reset_code', 'reset_verified']);

        return redirect()->route('login')->with('success', 'Votre mot de passe a été réinitialisé avec succès.');
    }
}
