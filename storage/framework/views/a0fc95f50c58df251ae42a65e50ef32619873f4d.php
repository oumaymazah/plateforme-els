<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Réinitialisation du mot de passe</h2>
    <form method="POST" action="<?php echo e(route('reset.password.verify')); ?>">
        <?php echo csrf_field(); ?>
        <h4>Vérification du code</h4>
        <p>Un code a été envoyé à votre email. Veuillez le saisir ci-dessous.</p>
        <div class="form-group">
            <label>Code de vérification</label>
            <input type="text" name="code" class="form-control" required>
            <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button type="submit" class="btn btn-primary">Vérifier</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\apprendre laravel\platformeEls\resources\views/auth/verify-code.blade.php ENDPATH**/ ?>