<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="border: none; border-radius: 15px; box-shadow: 0 0 20px rgba(0,0,0,0.05); padding: 30px 20px;">
                <div class="card-header text-center" style="background: white; border-bottom: none; padding: 10px 0 20px;">
                    <h4 style="font-weight: 600; font-size: 28px; color: #333; margin-bottom: 5px;">Validation de votre compte</h4>
                </div>
                <div class="card-body" style="padding: 0 30px 30px;">
                    <p class="text-center" style="color: #666; font-size: 16px; line-height: 1.5; margin-bottom: 40px;">
                        Un code de validation a été envoyé à votre adresse e-mail.<br>
                        Veuillez entrer ce code pour activer votre compte.
                    </p>

                    <!-- Afficher un message d'erreur si le code est incorrect -->
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('warning')): ?>
                        <div class="alert alert-warning">
                            <?php echo e(session('warning')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('info')): ?>
                        <div class="alert alert-info">
                            <?php echo e(session('info')); ?>

                        </div>
                    <?php endif; ?>

                    <!-- Formulaire de validation -->
                    <form method="POST" action="<?php echo e(route('validation.code')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-5">
                            <label for="validation_code" style="display: none;">Code de validation</label>
                            <input type="hidden" id="validation_code" name="validation_code">

                            <!-- Affichage des cases de code individuelles -->
                            <div style="display: flex; justify-content: space-between; gap: 10px; margin-bottom: 20px;">
                                <?php for($i = 1; $i <= 6; $i++): ?>
                                <div style="width: 55px; height: 55px;">
                                    <input type="text"
                                           class="code-input"
                                           style="width: 100%; height: 100%; text-align: center; font-size: 24px; font-weight: bold;
                                                  border-radius: 12px; border: 1px solid #ddd; background-color: #f5f5f5;
                                                  <?php if($i == 4): ?> border: 1.5px solid #4285F4; background-color: white; <?php endif; ?>
                                                  <?php if($i == 6): ?> border: 1.5px solid #333; background-color: white; <?php endif; ?>"
                                           maxlength="1"
                                           data-index="<?php echo e($i); ?>"
                                           autocomplete="off">
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <button type="submit" class="btn btn-primary"
                                    style="background-color: #4285F4; border: none; border-radius: 50px;
                                    width: 100%; padding: 15px; font-size: 18px; font-weight: 500; box-shadow: 0 4px 8px rgba(66, 133, 244, 0.2);">
                                Valider mon compte
                            </button>
                        </div>
                    </form>

                    <div class="text-center" style="margin-top: 30px;">
                        <a href="<?php echo e(route('resend.code')); ?>"
                           style="color: #666; text-decoration: none; font-size: 16px; font-weight: 400;">
                            Renvoyer un code
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script pour gérer les cases de code -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const codeInputs = document.querySelectorAll('.code-input');
    const validationInput = document.getElementById('validation_code');

    // Fonction pour mettre à jour le champ caché avec tous les codes
    function updateValidationCode() {
        let code = '';
        codeInputs.forEach(input => {
            code += input.value;
        });
        validationInput.value = code;
    }

    // Ajouter les écouteurs d'événements pour chaque case
    codeInputs.forEach((input, index) => {
        // Quand on entre un chiffre, passer au champ suivant
        input.addEventListener('input', function() {
            updateValidationCode();

            if (this.value.length === 1 && index < codeInputs.length - 1) {
                codeInputs[index + 1].focus();
            }
        });

        // Quand on utilise la touche retour arrière
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && this.value.length === 0 && index > 0) {
                codeInputs[index - 1].focus();
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\apprendre laravel\platformeEls\resources\views/auth/verify.blade.php ENDPATH**/ ?>