<div id="alert-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1050; max-width: 600px;"></div>
<?php $__env->startSection('title'); ?>Contacts
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/sweetalert2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/alert.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/role_permission.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Contacts</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item">Apps</li>
		<li class="breadcrumb-item active">Contacts</li>
        <div id="alert-container" class="mt-3"></div>
	<?php echo $__env->renderComponent(); ?>
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
	                                        <li class="nav-item"><span class="main-title"> Vues</span></li>
	                                        <li>
	                                            <a id="load-users" data-bs-toggle="pill" href="javascript:void(0)" data-user-url="<?php echo e(route('admin.users.index')); ?>" role="tab" aria-controls="pills-personal" aria-selected="true"><span class="title"> Utilisateurs</span></a>
	                                        </li>

                                            <li>
                                                <a href="javascript:void(0)" id="load-roles" data-roles-url="<?php echo e(route('admin.roles.index')); ?>">
                                                <span class="title">Gestion Rôles</span>
                                                </a>
                                            </li>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gérer des permissions')): ?>
                                                <li>
                                                    <a href="javascript:void(0)" id="load-permission" data-permission-url="<?php echo e(route('admin.permissions.index')); ?>"><span class="title">Gestion Permissions</span></a>
                                                </li>
                                            <?php endif; ?>

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


	<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bookmark/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/contacts/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/modal-animated.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/ajax/roles/editRole.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/ajax/roles/createRole.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/ajax/roles/chargerRole.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/ajax/roles/deleteRole.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/ajax/permissions/chargerPermission.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/ajax/permissions/createPermission.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/ajax/permissions/editPermission.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/ajax/permissions/deletePermission.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/ajax/users/chargerUser.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/ajax/users/roles.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/ajax/users/status.js')); ?>"></script>
    <script>

    </script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/apps/contacts.blade.php ENDPATH**/ ?>