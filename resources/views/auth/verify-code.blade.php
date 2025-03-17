@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Réinitialisation du mot de passe</h2>
    <form method="POST" action="{{ route('reset.password.verify') }}">
        @csrf
        <h4>Vérification du code</h4>
        <p>Un code a été envoyé à votre email. Veuillez le saisir ci-dessous.</p>
        <div class="form-group">
            <label>Code de vérification</label>
            <input type="text" name="code" class="form-control" required>
            @error('code') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Vérifier</button>
    </form>
</div>
@endsection
