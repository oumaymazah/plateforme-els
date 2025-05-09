
<div class="container">
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary text-white">
            <h4 class="m-0">Détails de la tentative</h4>
            <a href="{{ route('admin.quiz-attempts.index', request()->query()) }}"
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
                                    <td>{{ $attempt->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $attempt->user->email }}</td>
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
                                    <td>{{ $attempt->quiz->title }}</td>
                                </tr>
                                <tr>
                                    <th>Formation</th>
                                    <td>{{ $attempt->quiz->training->title }}</td>
                                </tr>
                                <tr>
                                    <th>Score</th>
                                    <td>
                                        <span class="badge {{ $attempt->passed ? 'badge-success' : 'badge-danger' }}">
                                            {{ $attempt->score }}/20
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Durée</th>
                                    <td>{{ $attempt->started_at->diff($attempt->finished_at)->format('%H:%I:%S') }}</td>
                                </tr>
                                @if($attempt->isCheated())
                                <tr class="table-warning">
                                    <th>Alertes</th>
                                    <td>
                                        <i class="fas fa-exclamation-triangle"></i>
                                        Triche détectée ({{ $attempt->tab_switches }} changements d'onglet)
                                    </td>
                                </tr>
                                @endif
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
                                @foreach($attempt->userAnswers as $index => $userAnswer)
                                <tr class="{{ $userAnswer->is_correct ? 'table-success' : 'table-danger' }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $userAnswer->question->question_text }}</td>
                                    <td>
                                        {{ $userAnswer->answer->answer_text }}
                                        @if($userAnswer->is_correct)
                                            <span class="badge badge-success float-right">Correct</span>
                                        @else
                                            <span class="badge badge-danger float-right">Incorrect</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$userAnswer->is_correct)
                                            <strong>Réponse correcte :</strong>
                                            {{ $userAnswer->question->correctAnswers->first()->answer_text }}
                                        @else
                                            <span class="text-success">
                                                <i class="fas fa-check-circle"></i> Bonne réponse
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
