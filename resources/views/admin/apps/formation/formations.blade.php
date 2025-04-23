@extends('layouts.admin.master')
@section('title')
    Liste des Formations {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/MonCss/formations-gallery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/MonCss/cart-core.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/MonCss/formation-detail-interaction.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/MonCss/formations-details.css') }}">

@endpush

@section('content')
    <div class="container-fluid">
        @include('admin.apps.categorie.categories-filter')

        <div class="row project-cards">
            <div class="col-md-12 project-list">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6 p-0">
                            <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i data-feather="target"></i>Tous</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>Publiées</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="info"></i>Non publiées</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 p-0">
                            <a class="btn btn-primary custom-btn" href="{{ route('formationcreate') }}">
                                <i data-feather="plus-square"></i>Ajouter une formation
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        {{-- @if(session('success'))
                            <div class="alert alert-success" id="success-message">
                                {{ session('success') }}
                            </div>
                        @endif --}}

                        {{-- @if(session('delete'))
                            <div class="alert alert-danger" id="delete-message">
                                {{ session('delete') }}
                            </div>
                        @endif --}}

                        @if(session('create'))
                            <div class="alert alert-info" id="create-message">
                                {{ session('create') }}
                            </div>
                        @endif

                        <div class="tab-content" id="top-tabContent">
                            <meta name="csrf-token" content="{{ csrf_token() }}">


                            <!-- Toutes les formations -->
                            <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                <div class="carousel-container">
                                    <div class="formations-carousel">
                                        @foreach($formations as $formation)
                                            <div>
                                                <div class="formation-card" >

                                                    @if($formation->status && isset($formation->is_bestseller) && $formation->is_bestseller)
                                                        <span class="badge-bestseller">Meilleure vente</span>
                                                    @endif

                                                    @if($formation->image)
                                                        <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->title }}">


                                                    @else
                                                        <div class="placeholder-image">Image de formation</div>
                                                    @endif

                                                    <h4 class="formation-title">{{ $formation->title }}</h4>
                                                    <div class="formation-instructor">
                                                        @if($formation->user)
                                                            {{ $formation->user->name }} {{ $formation->user->lastname ?? '' }}
                                                        @else
                                                            Professeur non défini
                                                        @endif
                                                    </div>
                                                    <div class="formation-details">
                                                        <div class="formation-duration">
                                                            {{-- <i class="fas fa-clock"></i> Durée:  --}}
                                                            <span class="formation-duration-value" style="display: none;">{{ $formation->duration }}</span>
                                                        </div>
                                                        <div class="formation-courses-count">
                                                            {{-- <i class="fas fa-book"></i>  --}}
                                                            <span class="formation-courses-count-value" style="display: none;">{{ $formation->courses->count() }}</span> cours
                                                        </div>
                                                    </div>



                                                    <div class="formation-description" style="display: none;">{!! $formation->description !!}</div>
                                                            <div class="formation-rating-price">
                                                                <div class="formation-rating">
                                                                    @if(isset($formation->average_rating) && $formation->average_rating !== null && ($formation->total_feedbacks ?? 0) > 0)
                                                                        <span class="rating-value">{{ number_format($formation->average_rating, 1) }}</span>
                                                                        <span class="rating-stars">
                                                                            @php
                                                                                $rating = $formation->average_rating;
                                                                                $fullStars = floor($rating);
                                                                                $decimalPart = $rating - $fullStars;
                                                                                $hasHalfStar = $decimalPart >= 0.25; // Seuil à 0.25 pour plus de précision
                                                                            @endphp

                                                                            @for($i = 1; $i <= 5; $i++)
                                                                                @if($i <= $fullStars)
                                                                                    <i class="fas fa-star"></i> <!-- Étoile pleine -->
                                                                                @elseif($i == $fullStars + 1 && $hasHalfStar)
                                                                                    <i class="fas fa-star-half-alt"></i> <!-- Demi-étoile -->
                                                                                @else
                                                                                    <i class="far fa-star"></i> <!-- Étoile vide -->
                                                                                @endif
                                                                            @endfor
                                                                        </span>
                                                                        <span class="rating-count">({{ $formation->total_feedbacks }})</span>
                                                                    @endif
                                                                </div>
                                                        <div class="price-container">
                                                            @if($formation->discount > 0)
                                                                <div style="display: flex; align-items: center;">
                                                                    <span class="original-price">{{ number_format($formation->price, 3) }} DT</span>
                                                                    <span class="discount-badge">-{{ $formation->discount }}%</span>
                                                                </div>
                                                                <span class="final-price">{{ number_format($formation->final_price, 3) }} DT</span>
                                                            @else
                                                                <span class="final-price">{{ number_format($formation->price, 3) }} DT</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="action-icons">
                                                        <i class="icofont icofont-edit edit-icon action-icon" data-edit-url="{{ route('formationedit', $formation->id) }}"></i>
                                                        <i class="icofont icofont-ui-delete delete-icon action-icon" data-delete-url="{{ route('formationdestroy', $formation->id) }}" data-csrf="{{ csrf_token() }}"></i>
                                                    </div>
                                                </div>


                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Formations publiées -->
        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
        <div class="carousel-container">
            <div class="formations-carousel-published">
                @foreach($formations as $formation)
                    @if($formation->status)
                        <div>
                            <div class="formation-card">
                                @if(isset($formation->is_bestseller) && $formation->is_bestseller)
                                    <span class="badge-bestseller">Meilleure vente</span>
                                @endif

                                @if($formation->image)
                                    <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->title }}">
                                @else
                                    <div class="placeholder-image">Image de formation</div>
                                @endif

                                <h4 class="formation-title">{{ $formation->title }}</h4>
                                <div class="formation-instructor">
                                    @if($formation->user)
                                        {{ $formation->user->name }} {{ $formation->user->lastname ?? '' }}
                                    @else
                                        Professeur non défini
                                    @endif
                                </div>

                            <div class="formation-description" style="display: none;">{!! $formation->description !!}</div>

                            <div class="formation-rating-price">
                                <div class="formation-rating">
                                    @if(isset($formation->average_rating) && $formation->average_rating !== null && ($formation->total_feedbacks ?? 0) > 0)
                                        <span class="rating-value">{{ number_format($formation->average_rating, 1) }}</span>
                                        <span class="rating-stars">
                                            @php
                                                $rating = $formation->average_rating;
                                                $fullStars = floor($rating);
                                                $decimalPart = $rating - $fullStars;
                                                $hasHalfStar = $decimalPart >= 0.25; // Seuil à 0.25 pour plus de précision
                                            @endphp

                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $fullStars)
                                                    <i class="fas fa-star"></i> <!-- Étoile pleine -->
                                                @elseif($i == $fullStars + 1 && $hasHalfStar)
                                                    <i class="fas fa-star-half-alt"></i> <!-- Demi-étoile -->
                                                @else
                                                    <i class="far fa-star"></i> <!-- Étoile vide -->
                                                @endif
                                            @endfor
                                        </span>
                                        <span class="rating-count">({{ $formation->total_feedbacks }})</span>
                                    @endif
                                </div>

                                <div class="price-container">
                                    @if($formation->price == 0)
                                        <span class="final-price">Gratuit</span>
                                    @else
                                        @if($formation->discount > 0)
                                            <div style="display: flex; align-items: center;">
                                                <span class="original-price">{{ number_format($formation->price, 3) }} DT</span>
                                                <span class="discount-badge">-{{ $formation->discount }}%</span>
                                            </div>
                                            <span class="final-price">{{ number_format($formation->final_price, 3) }} DT</span>
                                        @else
                                            <span class="final-price">{{ number_format($formation->price, 3) }} DT</span>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="action-icons">
                                <i class="icofont icofont-ui-edit edit-icon action-icon" data-edit-url="{{ route('formationedit', $formation->id) }}"></i>
                                <i class="icofont icofont-ui-delete delete-icon action-icon" data-delete-url="{{ route('formationdestroy', $formation->id) }}" data-csrf="{{ csrf_token() }}"></i>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
                            <!-- Formations non publiées -->
                                <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                                    <div class="carousel-container">
                                        <div class="formations-carousel-unpublished">
                                            @foreach($formations as $formation)
                                                @if(!$formation->status)
                                                    <div>
                                                        <div class="formation-card" >
                                                            @if($formation->status && isset($formation->is_bestseller) && $formation->is_bestseller)
                                                                <span class="badge-bestseller">Meilleure vente</span>
                                                            @endif

                                                            @if($formation->image)
                                                                <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->title }}">
                                                            @else
                                                                <div class="placeholder-image">Image de formation</div>
                                                            @endif

                                                            <h4 class="formation-title">{{ $formation->title }}</h4>
                                                            <div class="formation-instructor">
                                                                @if($formation->user)
                                                                    {{ $formation->user->name }} {{ $formation->user->lastname ?? '' }}
                                                                @else
                                                                    Professeur non défini
                                                                @endif
                                                            </div>
                                                            <div class="formation-description" style="display: none;">{!! $formation->description !!}</div>




                                                            <div class="formation-rating-price">
                                                                <div class="formation-rating">
                                                                    @if(isset($formation->average_rating) && $formation->average_rating !== null && ($formation->total_feedbacks ?? 0) > 0)
                                                                        <span class="rating-value">{{ number_format($formation->average_rating, 1) }}</span>
                                                                        <span class="rating-stars">
                                                                            @php
                                                                                $rating = $formation->average_rating;
                                                                                $fullStars = floor($rating);
                                                                                $decimalPart = $rating - $fullStars;
                                                                                $hasHalfStar = $decimalPart >= 0.25;
                                                                            @endphp

                                                                            @for($i = 1; $i <= 5; $i++)
                                                                                @if($i <= $fullStars)
                                                                                    <i class="fas fa-star"></i>
                                                                                @elseif($i == $fullStars + 1 && $hasHalfStar)
                                                                                    <i class="fas fa-star-half-alt"></i>
                                                                                @else
                                                                                    <i class="far fa-star"></i>
                                                                                @endif
                                                                            @endfor
                                                                        </span>
                                                                        <span class="rating-count">({{ $formation->total_feedbacks }})</span>
                                                                    @endif
                                                                </div>
                                                                <div class="price-container">
                                                                    @if($formation->discount > 0)
                                                                        <div style="display: flex; align-items: center;">
                                                                            <span class="original-price">{{ number_format($formation->price, 3) }} DT</span>
                                                                            <span class="discount-badge">-{{ $formation->discount }}%</span>
                                                                        </div>
                                                                        <span class="final-price">{{ number_format($formation->final_price, 3) }} DT</span>
                                                                    @else
                                                                        <span class="final-price">{{ number_format($formation->price, 3) }} DT</span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="action-icons">
                                                                <i class="icofont icofont-ui-edit edit-icon action-icon" data-edit-url="{{ route('formationedit', $formation->id) }}"></i>
                                                                <i class="icofont icofont-ui-delete delete-icon action-icon" data-delete-url="{{ route('formationdestroy', $formation->id) }}" data-csrf="{{ csrf_token() }}"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>


                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/height-equal.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="{{ asset('assets/js/MonJs/formations/utils.js') }}"></script>
    <script src="{{ asset('assets/js/MonJs/formations/formation-gallery.js') }}"></script>
    <script src="{{ asset('assets/js/MonJs/formations/formation-detail-paneau.js') }}"></script>
    <script src="{{ asset('assets/js/MonJs/formations/cart-core.js') }}"></script>
    <script src="{{ asset('assets/js/MonJs/formations/cart-ui.js') }}"></script>
    <script src="{{ asset('assets/js/MonJs/formations/action-menus.js') }}"></script>
    <script src="{{ asset('assets/js/MonJs/formations/categorie.js') }}"></script>
    <script src="{{ asset('assets/js/MonJs/toast/toast.js') }}"></script>

    <script>
        // Script pour afficher le toast si un message de succès est présent
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                toast.success('{{ session('success') }}');
            @endif
        });
    </script>


<style id="cart-badge-styles">
    .cart-badge, .custom-violet-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: #2563EB;
        color: white;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        z-index: 10;
    }
</style>
<script>
    // Script prioritaire qui s'exécute immédiatement
    (function() {
        // Récupérer la valeur du panier depuis localStorage
        const count = parseInt(localStorage.getItem('cartCount') || '0');
        if (count <= 0) return; // Ne rien faire s'il n'y a pas d'articles
        
        // Créer l'élément badge
        const badge = document.createElement('span');
        badge.className = 'cart-badge custom-violet-badge badge-preloaded';
        badge.textContent = count.toString();
        badge.style.display = 'block';
        
        // Stocker l'élément dans une variable globale pour référence future
        window.__preloadedBadge = badge;
        
        // Fonction qui tente d'ajouter le badge au conteneur du panier
        function attachBadge() {
            // Liste des sélecteurs possibles pour l'icône du panier
            const selectors = [
                '.shopping-cart-icon', 
                'svg[data-icon="shopping-cart"]', 
                '.cart-icon', 
                'a[href*="panier"] svg', 
                '.cart-container svg',
                'a[href*="panier"]',
                '.cart-link',
                '.header-cart'
            ];
            
            // Essayer de trouver l'icône du panier
            let cartIcon = null;
            for (const selector of selectors) {
                cartIcon = document.querySelector(selector);
                if (cartIcon) break;
            }
            
            if (!cartIcon) {
                // Réessayer rapidement si l'icône n'est pas encore disponible
                setTimeout(attachBadge, 10);
                return;
            }
            
            // Trouver le conteneur de l'icône
            const cartContainer = cartIcon.closest('a, div, button, .cart-container') || cartIcon;
            
            // Vérifier si un badge existe déjà
            if (!cartContainer.querySelector('.cart-badge, .custom-violet-badge')) {
                // Forcer la position relative sur le conteneur
                cartContainer.style.position = 'relative';
                
                // Ajouter le badge
                cartContainer.appendChild(badge);
            }
        }
        
        // Commencer la tentative d'attachement immédiatement
        attachBadge();
        
        // Aussi ajouter un écouteur pour le chargement du DOM complet
        document.addEventListener('DOMContentLoaded', attachBadge);
    })();
</script>








@endpush
