<div class="modal fade" id="EditRoleModal" tabindex="-1" role="dialog" aria-labelledby="createRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoleModalLabel">Modifier un rôle</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.roles.update',$role->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row g-2">
                        <div class="mb-3 col-md-12">
                            <label for="roleName">Nom du rôle</label>
                            <input class="form-control" type="text" id="roleName" name="name" required value="<?php echo e(old('name', $role->name)); ?>" autocomplete="off">
                        </div>
                    </div>
                    <button class="btn btn-secondary" type="submit">Modifier</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Annuler</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/role/edit.blade.php ENDPATH**/ ?>