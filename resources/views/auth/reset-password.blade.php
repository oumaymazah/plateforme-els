@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <h4>Réinitialisation du mot de passe</h4>
    <div class="form-group">
        <label>Nouveau mot de passe</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
</form>
@endsection
