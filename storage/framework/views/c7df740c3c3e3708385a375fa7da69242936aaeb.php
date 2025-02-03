<?php $__env->startSection('title'); ?>  Roles
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/sweetalert2.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Roles</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item">Apps</li>
		<li class="breadcrumb-item active">Roles</li>
    <?php echo $__env->renderComponent(); ?>
    <div class="tab-pane fade" id="pills-organization" role="tabpanel" aria-labelledby="pills-organization-tab">
        <div class="card">
            <div class="card-header">
                <h5>Gestion des Rôles</h5>
                <a href="<?php echo e(route('admin.roles.create')); ?>" class="btn btn-primary float-end">Créer un Nouveau Rôle</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom du Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($role->name); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.roles.edit', $role->id)); ?>" class="btn btn-warning btn-sm">Modifier</a>
                                <form action="<?php echo e(route('admin.roles.destroy', $role->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce rôle ?');">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/role/index.blade.php ENDPATH**/ ?>