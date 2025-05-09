
<div class="container">
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary text-white">
            <h4 class="m-0">Détails de la tentative</h4>
            <a href="<?php echo e(route('admin.quiz-attempts.index', request()->query())); ?>"
               class="btn btn-light">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>

        <div class="card-body">
            <!-- Section Entête -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Informations étudiant</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th width="40%">Nom complet</th>
                                    <td><?php echo e($attempt->user->name); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo e($attempt->user->email); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Résultats</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th width="40%">Quiz</th>
                                    <td><?php echo e($attempt->quiz->title); ?></td>
                                </tr>
                                <tr>
                                    <th>Formation</th>
                                    <td><?php echo e($attempt->quiz->training->title); ?></td>
                                </tr>
                                <tr>
                                    <th>Score</th>
                                    <td>
                                        <span class="badge <?php echo e($attempt->passed ? 'badge-success' : 'badge-danger'); ?>">
                                            <?php echo e($attempt->score); ?>/20
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Durée</th>
                                    <td><?php echo e($attempt->started_at->diff($attempt->finished_at)->format('%H:%I:%S')); ?></td>
                                </tr>
                                <?php if($attempt->isCheated()): ?>
                                <tr class="table-warning">
                                    <th>Alertes</th>
                                    <td>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        Triche détectée (<?php echo e($attempt->tab_switches); ?> changements d'onglet)
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Détail des réponses -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Réponses détaillées</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="45%">Question</th>
                                    <th width="25%">Réponse donnée</th>
                                    <th width="25%">Correction</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $attempt->userAnswers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $userAnswer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php echo e($userAnswer->is_correct ? 'table-success' : 'table-danger'); ?>">
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($userAnswer->question->question_text); ?></td>
                                    <td>
                                        <?php echo e($userAnswer->answer->answer_text); ?>

                                        <?php if($userAnswer->is_correct): ?>
                                            <span class="badge badge-success float-right">Correct</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger float-right">Incorrect</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!$userAnswer->is_correct): ?>
                                            <strong>Réponse correcte :</strong>
                                            <?php echo e($userAnswer->question->correctAnswers->first()->answer_text); ?>

                                        <?php else: ?>
                                            <span class="text-success">
                                                <i class="fas fa-check-circle"></i> Bonne réponse
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/quizzes/attempt-single.blade.php ENDPATH**/ ?>