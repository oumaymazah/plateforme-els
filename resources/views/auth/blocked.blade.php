@extends('admin.authentication.master')

@section('title')Compte Bloqué @endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .auth-bg {
        background-color: #f8f9fa;
    }
    .blocked-icon {
        font-size: 4rem;
        color: #dc3545;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="fas fa-user-lock blocked-icon"></i>
                    </div>
                    <h2 class="mb-4">Compte Bloqué</h2>
                    <p class="lead mb-4">Votre compte a été bloqué suite à plusieurs tentatives de connexion échouées.</p>
                    <p class="mb-4">Pour débloquer votre compte, veuillez contacter l'administrateur système.</p>
                    <div class="d-grid gap-2">
                        <a href="mailto:admin@example.com" class="btn btn-primary">
                            <i class="fas fa-envelope me-2"></i>Contacter l'Administrateur
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Retour à la page de connexion
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
