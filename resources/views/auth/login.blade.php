@extends('admin.authentication.master')

@section('title') Connexion {{ $title }} @endsection

@push('css')
@endpush

@section('content')
    <section>
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/3.jpg') }}" alt="page de connexion" /></div>
	            <div class="col-xl-7 p-0">
	                <div class="login-card">
	                    <form class="theme-form login-form needs-validation" method="POST" action="{{ route('login') }}" novalidate>
	                        @csrf

	                        <h4>Connexion</h4>
	                        <h6>Bienvenue ! Connectez-vous à votre compte.</h6>


	                        <div class="form-group">
	                            <label>Adresse Email</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-email"></i></span>
	                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required placeholder="exemple@gmail.com" value="{{ old('email') }}" />
	                                <div class="invalid-feedback js-error">Veuillez entrer votre email.</div>
	                                @error('email')
	                                    <div class="invalid-feedback laravel-error" style="display: block;">{{ $message }}</div>
	                                @enderror
	                            </div>
	                        </div>


	                        <div class="form-group">
	                            <label>Mot de passe</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-lock"></i></span>
	                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required placeholder="*********" />
	                                <div class="show-hide"><span class="show"> </span></div>
	                                <div class="invalid-feedback js-error">Veuillez entrer votre mot de passe.</div>
	                                @error('password')
	                                    <div class="invalid-feedback laravel-error" style="display: block;">{{ $message }}</div>
	                                @enderror
	                            </div>
	                        </div>


	                        <div class="form-group">
	                            <div class="checkbox">
	                                <input id="checkbox1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
	                                <label class="text-muted" for="checkbox1">Se souvenir de moi</label>
	                            </div>
	                            <a class="link" href="{{ route('forgot.password') }}">Mot de passe oublié ?</a>
	                        </div>


	                        <div class="form-group">
	                            <button class="btn btn-primary btn-block" type="submit">Se connecter</button>
	                        </div>


	                        <div class="login-social-title">
	                            <h5>Se connecter avec</h5>
	                        </div>
	                        <div class="form-group">
	                            <ul class="login-social">
	                                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="linkedin"></i></a></li>
	                                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="twitter"></i></a></li>
	                                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="facebook"></i></a></li>
	                                <li><a href="https://www.instagram.com/login" target="_blank"><i data-feather="instagram"> </i></a></li>
	                            </ul>
	                        </div>


	                        <p>Vous n'avez pas encore de compte ? <a class="ms-2" href="{{ route('sign-up') }}">Créer un compte</a></p>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

@push('scripts')
    <script src="{{ asset('assets/js/form-validation/form_validation2.js') }}"></script>
@endpush
@endsection
