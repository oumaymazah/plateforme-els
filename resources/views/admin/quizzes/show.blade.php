@extends('layouts.admin.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush
@section('content')
    {{-- Affichage du message de succès --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Affichage des erreurs de validation --}}
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    
<div class="container">
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">Détails du Quiz: {{ $quiz->title }}</h4>
            <div>
                <a href="{{ route('admin.quizzes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
        </div>

        <div class="card-body">
            <!-- Statut de publication -->
            @if(!$quiz->is_published)
                <div class="alert alert-warning">
                    <h5><i class="fas fa-exclamation-triangle"></i> Ce quiz n'est pas publié</h5>
                    <p class="mb-0">Les étudiants ne peuvent pas voir ou passer ce quiz.</p>
                </div>
            @else
                <div class="alert alert-success">
                    <h5><i class="fas fa-check-circle"></i> Ce quiz est publié</h5>
                    <p class="mb-0">Visible par les étudiants dans la formation: {{ $quiz->training->title }}</p>
                </div>
            @endif

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
                                    <td>{{ $quiz->training->title }}</td>
                                </tr>
                                <tr>
                                    <th>Type:</th>
                                    <td>
                                        @if($quiz->isPlacementTest())
                                            <span class="badge badge-info">Test de niveau</span>
                                        @else
                                            <span class="badge badge-primary">Quiz final</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Durée:</th>
                                    <td>{{ $quiz->duration }} minutes</td>
                                </tr>
                                @if($quiz->isFinalQuiz())
                                <tr>
                                    <th>Score de passage:</th>
                                    <td>{{ $quiz->passing_score }}/20</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Nombre de questions:</th>
                                    <td>{{ $quiz->questions->count() }}</td>
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
                            @if(!$quiz->is_published)
                                <form action="{{ route('admin.quizzes.publish', $quiz->id) }}" method="POST" class="mb-3">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-block">
                                        <i class="fas fa-check"></i> Publier ce quiz
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('admin.quizzes.toggle', $quiz->id) }}" method="POST" class="mb-3">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-block">
                                        <i class="fas fa-eye-slash"></i> Dépublier ce quiz
                                    </button>
                                </form>
                            @endif

                            {{-- <a href="{{ route('admin.quizzes.edit', $quiz->id) }}" class="btn btn-primary btn-block mb-3">
                                <i class="fas fa-edit"></i> Modifier
                            </a> --}}

                            <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
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
                    <h5 class="mb-0">Questions ({{ $quiz->questions->count() }})</h5>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
                        <i class="fas fa-plus"></i> Ajouter une question
                    </button>
                </div>
                <div class="card-body">
                    @if($quiz->questions->isEmpty())
                        <div class="alert alert-info">
                            Aucune question n'a été ajoutée à ce quiz.
                        </div>
                    @else

                        <div class="accordion" id="questionsAccordion">
                            @foreach($quiz->questions as $index => $question)
                            <div class="card mb-2">
                                <div class="card-header" id="heading{{ $index }}">
                                    <h6 class="mb-0 d-flex justify-content-between align-items-center">
                                        <button class="btn btn-link text-start w-100"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $index }}"
                                                aria-expanded="false"
                                                aria-controls="collapse{{ $index }}">
                                            Question {{ $index + 1 }}: {{ Str::limit($question->question_text, 50) }}
                                            <span class="badge bg-secondary ms-2">{{ $question->points }} pts</span>
                                        </button>
                                        <div>
                                            {{-- <button class="btn btn-sm btn-info"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editQuestionModal"
                                                    data-question-id="{{ $question->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button> --}}
                                            <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette question?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </h6>
                                </div>

                                <div id="collapse{{ $index }}"
                                     class="collapse"
                                     aria-labelledby="heading{{ $index }}"
                                     data-bs-parent="#questionsAccordion">
                                    <div class="card-body">
                                        <p><strong>Question complète:</strong> {{ $question->question_text }}</p>

                                        <h6>Réponses possibles:</h6>
                                        <ul class="list-group">
                                            @foreach($question->answers as $answer)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{ $answer->answer_text }}
                                                @if($answer->is_correct)
                                                    <span class="badge bg-success">Correcte</span>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Statistiques (si le quiz est publié) -->
            @if($quiz->is_published && $quiz->attempts->count() > 0)
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
                                    <h3>{{ $quiz->attempts->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white text-center">
                                <div class="card-body">
                                    <h5>Taux de réussite</h5>
                                    <h3>{{ number_format(($quiz->attempts->where('passed', true)->count() / $quiz->attempts->count()) * 100, 1) }}%</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-info text-white text-center">
                                <div class="card-body">
                                    <h5>Score moyen</h5>
                                    <h3>{{ number_format($quiz->attempts->avg('score'), 1) }}/20</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal pour ajouter une question -->
<div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="addQuestionModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.questions.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

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
                        @for($i = 1; $i <= 4; $i++)
                        <div class="form-group answer-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        {{-- <input type="radio" name="correct_answer" value="{{ $i }}" {{ $i == 1 ? 'checked' : '' }}> --}}
                                        <input type="checkbox" name="correct_answers[]" value="{{ $i }}">
                                    </div>
                                </div>
                                <input type="text" name="answers[]" class="form-control" placeholder="Réponse {{ $i }}" required>
                            </div>
                        </div>
                        @endfor
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
                @csrf
                @method('PUT')

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
{{-- <div class="modal fade" id="editQuestionModal" tabindex="-1" role="dialog" aria-labelledby="editQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editQuestionForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editQuestionModalLabel">Modifier la question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="edit_question_text">Question</label>
                        <textarea name="question_text" id="edit_question_text" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="edit_points">Points</label>
                        <input type="number" name="points" id="edit_points" class="form-control" min="1" required>
                    </div>

                    <h5>Réponses</h5>
                    <div id="edit-answers-container">
                        <!-- Les réponses seront injectées ici par JavaScript -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
@endsection



@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    // Gestion de l'édition des questions
    $(document).on('click', '.edit-question', function(e) {
        e.preventDefault();
        var questionId = $(this).data('id');

        // Charger les données via AJAX
        $.get("{{ route('admin.questions.edit', '') }}/" + questionId, function(data) {
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
            $('#editQuestionForm').attr('action', "{{ route('admin.questions.update', '') }}/" + questionId);

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



@endsection


