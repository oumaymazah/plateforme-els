{{-- @extends('layouts.admin.master')
<div id="alert-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1050; max-width: 600px;"></div>
@section('title')Contacts
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/alert.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/role_permission.css')}}">
@endpush

@section('content')

	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Utilisateurs et Accès</h3>
		@endslot
		<li class="breadcrumb-item">Applications</li>
		<li class="breadcrumb-item active">Utilisateurs et Accès</li>
        <div id="alert-container" class="mt-3"></div>
	@endcomponent
	<div class="container-fluid">
	    <div class="email-wrap bookmark-wrap">
	        <div class="row">
	            <div class="col-xl-3">
	                <div class="email-sidebar">
	                    <a class="btn btn-primary email-aside-toggle" href="javascript:void(0)">contact filter </a>
	                    <div class="email-left-aside">
	                        <div class="card">
	                            <div class="card-body">
	                                <div class="email-app-sidebar left-bookmark">
	                                    <ul class="nav main-menu contact-options" role="tablist">
	                                        <li class="nav-item">
                                                <button class="badge-light btn-block btn-mail w-100" type="button" id="loadCreateUserForm" data-create-url="{{ route('admin.users.create') }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="me-2" data-feather="users"></i> Nouveau Utilisateur
                                                </button>
                                            </li>


	                                        <li class="nav-item"><span class="main-title"> Vues</span></li>
	                                        <li>
	                                            <a id="load-users" data-bs-toggle="pill" href="javascript:void(0)" data-user-url="{{ route('admin.users.index') }}" role="tab" aria-controls="pills-personal" aria-selected="true"><span class="title"> Utilisateurs</span></a>
	                                        </li>

                                            <li>
                                                <a href="javascript:void(0)" id="load-roles" data-roles-url="{{ route('admin.roles.index') }}">
                                                <span class="title">Gestion Rôles</span>
                                                </a>
                                            </li>

                                            @can('gérer des permissions')
                                                <li>
                                                    <a href="javascript:void(0)" id="load-permission" data-permission-url="{{ route('admin.permissions.index') }}"><span class="title">Gestion Permissions</span></a>
                                                </li>
                                            @endcan

	                                    </ul>
	                                </div>

	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>

                 <div class="col-xl-9">
                    <div id="blog-container">

                    </div>
                </div>

	        </div>
	    </div>
	</div>


	@push('scripts')
	<script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
    <script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
    <script src="{{asset('assets/js/bookmark/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('assets/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('assets/js/contacts/custom.js')}}"></script>
    <script src="{{asset('assets/js/modal-animated.js')}}"></script>
    <script src="{{asset('assets/ajax/roles/editRole.js')}}"></script>
    <script src="{{asset('assets/ajax/roles/createRole.js')}}"></script>
    <script src="{{asset('assets/ajax/roles/chargerRole.js')}}"></script>
    <script src="{{asset('assets/ajax/roles/deleteRole.js')}}"></script>
    <script src="{{asset('assets/ajax/permissions/chargerPermission.js')}}"></script>
    <script src="{{asset('assets/ajax/permissions/createPermission.js')}}"></script>
    <script src="{{asset('assets/ajax/permissions/editPermission.js')}}"></script>
    <script src="{{asset('assets/ajax/permissions/deletePermission.js')}}"></script>
    <script src="{{asset('assets/ajax/users/chargerUser.js')}}"></script>
    <script src="{{asset('assets/ajax/users/roles.js')}}"></script>
    <script src="{{asset('assets/ajax/users/status.js')}}"></script>
    <script src="{{asset('assets/ajax/users/supprimerUser.js')}}"></script>
    <script src="{{asset('assets/ajax/users/createUser.js')}}"></script>
    <script>

    </script>
	@endpush

@endsection --}}















@extends('layouts.admin.master')

@section('title') Gestion des Utilisateurs & Permissions @endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
<style>
    .badge-light { background-color: #f8f9fa; color: #212529; }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #7367f0;
        border-color: #7367f0;
        color: #fff;
    }
    #alert-container {
        z-index: 1100;
    }
</style>
@endpush

@section('content')
{{-- CSRF Token pour les requêtes AJAX --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<div id="alert-container" class="position-fixed top-0 end-0 p-3" style="max-width: 600px;"></div>

@component('components.breadcrumb')
    @slot('breadcrumb_title')
        <h3>Gestion des Utilisateurs & Permissions</h3>
    @endslot
    <li class="breadcrumb-item">Administration</li>
    <li class="breadcrumb-item active">Utilisateurs & Permissions</li>
@endcomponent

<div class="container-fluid">
    <div class="email-wrap bookmark-wrap">
        <div class="row">
            <div class="col-xl-3">
                <div class="email-sidebar">
                    <div class="email-left-aside">
                        <div class="card">
                            <div class="card-body">
                                <div class="email-app-sidebar left-bookmark">
                                    <ul class="nav main-menu contact-options" role="tablist">
                                        <li class="nav-item">
                                            <button class="badge-light btn-block btn-mail w-100" type="button"
                                                    id="loadCreateUserForm"
                                                    data-create-url="{{ route('admin.users.create') }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"
                                                    aria-label="Créer un nouvel utilisateur">
                                                <i class="me-2 fas fa-user-plus" aria-hidden="true"></i> Nouvel Utilisateur
                                            </button>
                                        </li>

                                        <li class="nav-item"><span class="main-title"> Vues</span></li>
                                        <li>
                                            <a id="load-users" href="javascript:void(0)"
                                               data-user-url="{{ route('admin.users.index') }}"
                                               aria-label="Afficher la liste des utilisateurs">
                                               <i class="me-2 fas fa-users" aria-hidden="true"></i> Utilisateurs
                                            </a>
                                        </li>
                                        <li>
                                            <a id="load-roles" href="javascript:void(0)"
                                               data-roles-url="{{ route('admin.roles.index') }}"
                                               aria-label="Afficher la liste des rôles">
                                               <i class="me-2 fas fa-user-tag" aria-hidden="true"></i> Rôles
                                            </a>
                                        </li>
                                        <li>
                                            <a id="load-permission" href="javascript:void(0)"
                                               data-permission-url="{{ route('admin.permissions.index') }}"
                                               aria-label="Afficher la liste des permissions">
                                               <i class="me-2 fas fa-key" aria-hidden="true"></i> Permissions
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9">
                <div id="blog-container" class="card">
                    <div class="card-body text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Chargement...</span>
                        </div>
                        <p class="mt-2">Chargement des données...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouvel Utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <!-- Form loaded dynamically -->
                <div class="text-center py-3">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                    <p class="mt-2">Chargement du formulaire...</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/ajax/admin-management.js') }}"></script>
@endpush

@endsection
