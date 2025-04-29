<?php $__env->startPush('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    
    <?php if($errors->any()): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    
<div class="container">
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">Détails du Quiz: <?php echo e($quiz->title); ?></h4>
            <div>
                <a href="<?php echo e(route('admin.quizzes.index')); ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
        </div>

        <div class="card-body">
            <!-- Statut de publication -->
            <?php if(!$quiz->is_published): ?>
                <div class="alert alert-warning">
                    <h5><i class="fas fa-exclamation-triangle"></i> Ce quiz n'est pas publié</h5>
                    <p class="mb-0">Les étudiants ne peuvent pas voir ou passer ce quiz.</p>
                </div>
            <?php else: ?>
                <div class="alert alert-success">
                    <h5><i class="fas fa-check-circle"></i> Ce quiz est publié</h5>
                    <p class="mb-0">Visible par les étudiants dans la formation: <?php echo e($quiz->training->title); ?></p>
                </div>
            <?php endif; ?>

            <!-- Informations de base -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Informations générales</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tr>
                                    <th>Formation associée:</th>
                                    <td><?php echo e($quiz->training->title); ?></td>
                                </tr>
                                <tr>
                                    <th>Type:</th>
                                    <td>
                                        <?php if($quiz->isPlacementTest()): ?>
                                            <span class="badge badge-info">Test de niveau</span>
                                        <?php else: ?>
                                            <span class="badge badge-primary">Quiz final</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Durée:</th>
                                    <td><?php echo e($quiz->duration); ?> minutes</td>
                                </tr>
                                <?php if($quiz->isFinalQuiz()): ?>
                                <tr>
                                    <th>Score de passage:</th>
                                    <td><?php echo e($quiz->passing_score); ?>/20</td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>Nombre de questions:</th>
                                    <td><?php echo e($quiz->questions->count()); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Actions</h5>
                        </div>
                        <div class="card-body text-center">
                            <?php if(!$quiz->is_published): ?>
                                <form action="<?php echo e(route('admin.quizzes.publish', $quiz->id)); ?>" method="POST" class="mb-3">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-success btn-block">
                                        <i class="fas fa-check"></i> Publier ce quiz
                                    </button>
                                </form>
                            <?php else: ?>
                                <form action="<?php echo e(route('admin.quizzes.toggle', $quiz->id)); ?>" method="POST" class="mb-3">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-warning btn-block">
                                        <i class="fas fa-eye-slash"></i> Dépublier ce quiz
                                    </button>
                                </form>
                            <?php endif; ?>

                            

                            <form action="<?php echo e(route('admin.quizzes.destroy', $quiz->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Supprimer définitivement ce quiz?')">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liste des questions -->
            <div class="card mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Questions (<?php echo e($quiz->questions->count()); ?>)</h5>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
                        <i class="fas fa-plus"></i> Ajouter une question
                    </button>
                </div>
                <div class="card-body">
                    <?php if($quiz->questions->isEmpty()): ?>
                        <div class="alert alert-info">
                            Aucune question n'a été ajoutée à ce quiz.
                        </div>
                    <?php else: ?>

                        <div class="accordion" id="questionsAccordion">
                            <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card mb-2">
                                <div class="card-header" id="heading<?php echo e($index); ?>">
                                    <h6 class="mb-0 d-flex justify-content-between align-items-center">
                                        <button class="btn btn-link text-start w-100"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse<?php echo e($index); ?>"
                                                aria-expanded="false"
                                                aria-controls="collapse<?php echo e($index); ?>">
                                            Question <?php echo e($index + 1); ?>: <?php echo e(Str::limit($question->question_text, 50)); ?>

                                            <span class="badge bg-secondary ms-2"><?php echo e($question->points); ?> pts</span>
                                        </button>
                                        <div>
                                            
                                            <form action="<?php echo e(route('admin.questions.destroy', $question->id)); ?>" method="POST" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette question?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </h6>
                                </div>

                                <div id="collapse<?php echo e($index); ?>"
                                     class="collapse"
                                     aria-labelledby="heading<?php echo e($index); ?>"
                                     data-bs-parent="#questionsAccordion">
                                    <div class="card-body">
                                        <p><strong>Question complète:</strong> <?php echo e($question->question_text); ?></p>

                                        <h6>Réponses possibles:</h6>
                                        <ul class="list-group">
                                            <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?php echo e($answer->answer_text); ?>

                                                <?php if($answer->is_correct): ?>
                                                    <span class="badge bg-success">Correcte</span>
                                                <?php endif; ?>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Statistiques (si le quiz est publié) -->
            <?php if($quiz->is_published && $quiz->attempts->count() > 0): ?>
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Statistiques</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white text-center">
                                <div class="card-body">
                                    <h5>Tentatives</h5>
                                    <h3><?php echo e($quiz->attempts->count()); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white text-center">
                                <div class="card-body">
                                    <h5>Taux de réussite</h5>
                                    <h3><?php echo e(number_format(($quiz->attempts->where('passed', true)->count() / $quiz->attempts->count()) * 100, 1)); ?>%</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-info text-white text-center">
                                <div class="card-body">
                                    <h5>Score moyen</h5>
                                    <h3><?php echo e(number_format($quiz->attempts->avg('score'), 1)); ?>/20</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal pour ajouter une question -->
<div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="addQuestionModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?php echo e(route('admin.questions.store')); ?>" method="POST" class="needs-validation" novalidate>
                <?php echo csrf_field(); ?>
                <input type="hidden" name="quiz_id" value="<?php echo e($quiz->id); ?>">

                <div class="modal-header">
                    <h5 class="modal-title" id="addQuestionModalLabel">Ajouter une nouvelle question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="question_text">Question</label>
                        <textarea name="question_text" id="question_text" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="points">Points</label>
                        <input type="number" name="points" id="points" class="form-control" value="1" min="1" required>
                    </div>

                    <h5>Réponses</h5>
                    <div id="answers-container">
                        <?php for($i = 1; $i <= 4; $i++): ?>
                        <div class="form-group answer-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        
                                        <input type="checkbox" name="correct_answers[]" value="<?php echo e($i); ?>">
                                    </div>
                                </div>
                                <input type="text" name="answers[]" class="form-control" placeholder="Réponse <?php echo e($i); ?>" required>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal d'édition de question -->
<div class="modal fade" id="editQuestionModal" tabindex="-1" aria-labelledby="editQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editQuestionForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editQuestionModalLabel">Modifier la question</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_question_text" class="form-label">Question</label>
                        <textarea class="form-control" id="edit_question_text" name="question_text" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="edit_points" class="form-label">Points</label>
                        <input type="number" class="form-control" id="edit_points" name="points" min="1" required>
                    </div>

                    <h5 class="mt-4">Réponses</h5>
                    <div id="edit-answers-container" class="answers-container">
                        <!-- Les réponses seront chargées ici -->
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal d'édition de question -->

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    // Gestion de l'édition des questions
    $(document).on('click', '.edit-question', function(e) {
        e.preventDefault();
        var questionId = $(this).data('id');

        // Charger les données via AJAX
        $.get("<?php echo e(route('admin.questions.edit', '')); ?>/" + questionId, function(data) {
            // Remplir le formulaire
            $('#edit_question_text').val(data.question.question_text);
            $('#edit_points').val(data.question.points);

            // Vider le conteneur des réponses
            $('#edit-answers-container').empty();

            // Ajouter chaque réponse
            // Ajouter chaque réponse
            $.each(data.answers, function(index, answer) {
                var isChecked = answer.is_correct ? 'checked' : '';
                var answerHtml = `
                <div class="form-group answer-group mb-2">
                    <div class="input-group">
                        <span class="input-group-text">
                            <input type="radio" name="correct_answer" value="${answer.id}" ${isChecked}>
                        </span>
                        <input type="text" name="answers[${index}][text]" class="form-control" value="${answer.answer_text}" required>
                        <input type="hidden" name="answers[${index}][id]" value="${answer.id}">
                    </div>
                </div>
                `;
                $('#edit-answers-container').append(answerHtml);
            });

            // Mettre à jour l'action du formulaire
            $('#editQuestionForm').attr('action', "<?php echo e(route('admin.questions.update', '')); ?>/" + questionId);

            // Afficher le modal
            // $('#editQuestionModal').modal('show');
            var myModal = new bootstrap.Modal(document.getElementById('editQuestionModal'));
            myModal.show();
        }).fail(function() {
            alert('Erreur lors du chargement de la question');
        });
    });

    // Soumission du formulaire d'édition
    $('#editQuestionForm').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(response) {
                // $('#editQuestionModal').modal('hide');
                var myModal = bootstrap.Modal.getInstance(document.getElementById('editQuestionModal'));
                myModal.hide();
                location.reload(); // Recharger la page pour voir les modifications
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    // Afficher les erreurs de validation
                    var errors = xhr.responseJSON.errors;
                    alert(Object.values(errors).join('\n'));
                } else {
                    alert('Une erreur est survenue');
                }
            }
        });
    });
});
</script>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\apprendre laravel\platformeEls\resources\views/admin/quizzes/show.blade.php ENDPATH**/ ?>