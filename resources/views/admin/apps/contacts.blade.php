@extends('layouts.admin.master')

@section('title')Contacts
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/alert.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/role_permission.css')}}">
@endpush

@section('content')

	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Contacts</h3>
		@endslot
		<li class="breadcrumb-item">Apps</li>
		<li class="breadcrumb-item active">Contacts</li>
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
	                                            <button class="badge-light btn-block btn-mail w-100" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="me-2" data-feather="users"></i> Nouveau Contact</button>
	                                            <div class="modal fade modal-bookmark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	                                                <div class="modal-dialog modal-lg" role="document">
	                                                    <div class="modal-content">
	                                                        <div class="modal-header">
	                                                            <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
	                                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
	                                                        </div>
	                                                        <div class="modal-body">
	                                                            <form class="form-bookmark needs-validation" id="bookmark-form" novalidate="">
	                                                                <div class="row g-2">
	                                                                    <div class="mb-3 col-md-12 mt-0">
	                                                                        <label for="con-name">Name</label>
	                                                                        <div class="row">
	                                                                            <div class="col-sm-6">
	                                                                                <input class="form-control" id="con-name" type="text" required="" placeholder="First Name" autocomplete="off" />
	                                                                            </div>
	                                                                            <div class="col-sm-6">
	                                                                                <input class="form-control" id="con-last" type="text" required="" placeholder="Last Name" autocomplete="off" />
	                                                                            </div>
	                                                                        </div>
	                                                                    </div>
	                                                                    <div class="mb-3 col-md-12 mt-0">
	                                                                        <label for="con-mail">Email Address</label>
	                                                                        <input class="form-control" id="con-mail" type="text" required="" autocomplete="off" />
	                                                                    </div>
	                                                                    <div class="mb-3 col-md-12 my-0">
	                                                                        <label for="con-phone">Phone</label>
	                                                                        <div class="row">
	                                                                            <div class="col-sm-6">
	                                                                                <input class="form-control" id="con-phone" type="number" required="" autocomplete="off" />
	                                                                            </div>
	                                                                            <div class="col-sm-6">
	                                                                                <select class="form-control" id="con-select">
	                                                                                    <option>Mobile</option>
	                                                                                    <option>Work</option>
	                                                                                    <option>Others</option>
	                                                                                </select>
	                                                                            </div>
	                                                                        </div>
	                                                                    </div>
	                                                                </div>
	                                                                <input id="index_var" type="hidden" value="5" />
	                                                                <button class="btn btn-secondary" type="submit" onclick="submitContact()">Save</button>
	                                                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
	                                                            </form>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </li>
	                                        <li class="nav-item"><span class="main-title"> Views</span></li>
	                                        <li>
	                                            <a id="load-users" data-bs-toggle="pill" href="javascript:void(0)" data-user-url="{{ route('admin.users.index') }}" role="tab" aria-controls="pills-personal" aria-selected="true"><span class="title"> Utilisateurs</span></a>
	                                        </li>

                                            <li>
                                                <a href="javascript:void(0)" id="load-roles" data-roles-url="{{ route('admin.roles.index') }}">
                                                <span class="title">Gestion Rôles</span>
                                                </a>
                                            </li>


	                                        <li>
	                                            <a href="javascript:void(0)" id="load-permission" data-permission-url="{{ route('admin.permissions.index') }}"><span class="title">Gestion Permissions</span></a>
	                                        </li>
	                                        <li>
	                                            <a href="javascript:void(0)"><span class="title">Favorites</span></a>
	                                        </li>
	                                        <li>
	                                            <a href="javascript:void(0)"><span class="title">Ideas</span></a>
	                                        </li>
	                                        <li>
	                                            <a href="javascript:void(0)"><span class="title">Important</span></a>
	                                        </li>
	                                        <li>
	                                            <a href="javascript:void(0)"><span class="title">Business</span></a>
	                                        </li>
	                                        <li>
	                                            <a href="javascript:void(0)"><span class="title">Holidays</span></a>
	                                        </li>
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
    <div id="alert-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1050; max-width: 600px;"></div>

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
    <script src="{{asset('assets/ajax/permissions/chargerPermission.js')}}"></script>
    <script src="{{asset('assets/ajax/permissions/createPermission.js')}}"></script>
    <script src="{{asset('assets/ajax/permissions/editPermission.js')}}"></script>
    <script src="{{asset('assets/ajax/users/chargerUser.js')}}"></script>
    <script src="{{asset('assets/ajax/users/roles.js')}}"></script>
    <script>

    </script>
	@endpush

@endsection
