




 <div class="container mt-4" id="roles_Permission">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Gestion des rôles pour <?php echo e($user->name); ?></h5>
            <button class="btn btn-secondary back-btn" data-back-tab="users">
                <i class="fas fa-arrow-left"></i> Retour
            </button>
        </div>
        <div class="card-body">
            <!-- Informations utilisateur -->
            <div class="user-info mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Nom :</strong> <?php echo e($user->name); ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Prénom :</strong> <?php echo e($user->lastname); ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Email :</strong> <?php echo e($user->email); ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Rôles attribués -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0"><i class="fas fa-user-tag me-2"></i>Rôles attribués</h6>
                        </div>
                        <div class="card-body p-0">
                            <?php if($user->roles->isNotEmpty()): ?>
                                <ul class="list-group list-group-flush">
                                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><?php echo e($role->name); ?></span>
                                        <a href="#" class="btn btn-sm btn-danger remove-role" title="Supprimer ce rôle" data-url="<?php echo e(route('admin.users.roles.remove', [$user->id, $role->id])); ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                <div class="text-center p-3">
                                    <p class="text-muted mb-0">Aucun rôle assigné</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Toutes les permissions -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-info text-white">
                            <h6 class="mb-0"><i class="fas fa-key me-2"></i>Toutes les permissions</h6>
                        </div>
                        <div class="card-body p-0">

                            <?php if($user->permissions->isNotEmpty() || $user->roles->isNotEmpty()): ?>
                                <ul class="list-group list-group-flush">
                                    <?php $__currentLoopData = $user->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <span><?php echo e($user_permission->name); ?></span>

                                        </div>
                                        <a href="#" class="btn btn-sm btn-danger revoke-permission" title="Révoquer cette permission" data-url="<?php echo e(route('admin.users.permissions.revoke', [$user->id, $user_permission->id])); ?>" data-user-id="<?php echo e($user->id); ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!$user->permissions->contains($permission)): ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div >
                                                        <span><?php echo e($permission->name); ?></span>

                                                    </div>
                                                    <a href="#" class="btn btn-sm btn-danger revoke-permission" title="Révoquer cette permission"
                                                        data-url="<?php echo e(route('admin.users.permissions.revoke', [$user->id, $permission->id])); ?>" >
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                            </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                <div class="text-center p-3">
                                    <p class="text-muted mb-0">Aucune permission</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/user/roles.blade.php ENDPATH**/ ?>