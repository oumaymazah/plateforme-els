@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container">
    <h2>Mot de passe oublié</h2>
    <form method="POST" action="{{ route('forgot.password.send') }}">
        @csrf
        <label>Adresse Email</label>
        <input type="email" name="email" required>
        <button type="submit">Envoyer le code</button>
    </form>
</div>
@endsection
