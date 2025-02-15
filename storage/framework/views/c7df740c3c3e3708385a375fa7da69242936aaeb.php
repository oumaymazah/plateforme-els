
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Gestion des Rôles</h5>
        <a  id="open-create-role-modal" data-create-url="<?php echo e(route('admin.roles.create')); ?>" class="btn btn-success">Créer un Nouveau Rôle</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="roles-table">  <thead class="table-primary">
                    <tr>
                        <th scope="col">Nom du Rôle</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($role->name); ?></td>
                        <td class="d-flex justify-content-around">
                            <a id="open-edit-role-modal" data-edit-url="<?php echo e(route('admin.roles.edit', $role->id)); ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="<?php echo e(route('admin.roles.destroy', $role->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce rôle ?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/role/index.blade.php ENDPATH**/ ?>