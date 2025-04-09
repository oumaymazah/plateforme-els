 





 <div class="card">
    <div class="card-header">
        <h5>Liste des Utilisateurs</h5>
        <div class="row mt-3">
            <div class="col-md-4">
                <select class="form-select filter-select" id="role-filter" aria-label="Filtrer par rôle">
                    <option value="">Tous les rôles</option>
                    <?php $__currentLoopData = $allRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select filter-select" id="status-filter" aria-label="Filtrer par statut">
                    <option value="">Tous les statuts</option>
                    <option value="active">Actif</option>
                    <option value="inactive">Inactif</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="users-table" class="table data-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôles</th>
                        <th>Statut</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($user->name); ?> <?php echo e($user->lastname ?? ''); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <?php $__empty_2 = true; $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                <span class="badge bg-primary"><?php echo e($role->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                <span class="badge bg-secondary">Aucun rôle</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input toggle-status-switch" type="checkbox"
                                       data-url="<?php echo e(route('admin.users.toggleStatus', $user)); ?>"
                                       id="status-<?php echo e($user->id); ?>" <?php echo e($user->status === 'active' ? 'checked' : ''); ?>>
                                
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light dropdown-toggle" type="button"
                                        id="dropdownMenuButton-<?php echo e($user->id); ?>" data-bs-toggle="dropdown"
                                        aria-expanded="false" aria-label="Actions pour <?php echo e($user->name); ?>">
                                    <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-<?php echo e($user->id); ?>">
                                    <li>
                                        <a class="dropdown-item view-user-roles" href="javascript:void(0)"
                                           data-url="<?php echo e(route('admin.users.roles', $user)); ?>">
                                            <i class="fas fa-eye me-2" aria-hidden="true"></i> Voir rôles
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item toggle-status-menu" href="javascript:void(0)"
                                           data-url="<?php echo e(route('admin.users.toggleStatus', $user)); ?>"
                                           data-status="<?php echo e($user->status); ?>">
                                            <i class="fas fa-sync-alt me-2" aria-hidden="true"></i> Basculer en <?php echo e($user->status === 'active' ? 'Inactif' : 'Actif'); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item delete-user" href="javascript:void(0)"
                                           data-url="<?php echo e(route('admin.users.destroy', $user)); ?>">
                                            <i class="fas fa-trash me-2" aria-hidden="true"></i> Supprimer
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center">Aucun utilisateur trouvé</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .dropdown-toggle::after {
        display: none;
    }
    .dropdown-menu {
        min-width: 10rem;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    .dropdown-item {
        padding: 0.35rem 1.5rem;
        font-size: 0.875rem;
    }
    .form-switch .form-check-input {
        width: 2.5em;
        height: 1.5em;
        cursor: pointer;
    }
    .btn-light {
        border: 1px solid #dee2e6;
        background-color: #f8f9fa;
    }
    .dropdown-toggle {
        padding: 0.25rem 0.5rem;
    }
    .badge {
        margin-right: 3px;
    }
</style>
<?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/user/index.blade.php ENDPATH**/ ?>