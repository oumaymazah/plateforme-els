
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Gestion des Permissions</h5>
        <a  id="open-create-permission-modal" data-create-url="<?php echo e(route('admin.permissions.create')); ?>" class="btn btn-success">Créer un Nouveau Permission</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="permission-table">  <thead class="table-primary">
                    <tr>
                        <th scope="col">Nom du Permission</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($permission->name); ?></td>
                        <td class="d-flex justify-content-around">
                            <a id="open-edit-permission-modal" data-edit-url="<?php echo e(route('admin.permissions.edit', $permission->id)); ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="<?php echo e(route('admin.permissions.destroy', $permission->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce permission ?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/permission/index.blade.php ENDPATH**/ ?>