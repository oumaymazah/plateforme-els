<div class="card">
    <div class="card-header">
        <h5>Utilisateurs</h5>
    </div>
    <div class="card-block row">
        <div class="col-sm-12 col-lg-12 col-xl-12">
            <div class="table-responsive">
                <table class="table table-styling" id="user-table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->lastname); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <div class="media">
                                    <div class="media-body text-end icon-state switch-outline">
                                        <label class="switch">
                                            <input type="checkbox" class="toggle-status" data-user-id="<?php echo e($user->id); ?>" <?php echo e($user->status === 'active' ? 'checked' : ''); ?>>
                                            <span class="switch-state bg-primary"></span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a id="RoleUser" data-edit-url="<?php echo e(route('admin.users.roles', $user->id)); ?>" class="btn btn-outline-info-2x">Plus D'info</a>
                                <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-outline-danger-2x">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/user/index.blade.php ENDPATH**/ ?>