<x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <head>
        <title>Tableau de Bord - Tâches</title>
        <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
    </head>
    
    <style>
        /* Styles personnalisés pour la modernité et la cohérence */

        /* Couleur personnalisée pour l'Objectif hebdomadaire */
        .bg-purple {
            /* Assombrissement pour meilleure lisibilité du texte blanc */
            background-color: #5d03a1 !important; 
        }

        /* Rayon pour les cartes d'indicateurs */
        .card-custom {
            border-radius: 1rem; /* 16px */
            transition: transform 0.2s; /* Effet de survol fluide */
        }
        .card-custom:hover {
            transform: translateY(-3px);
        }

        /* Style pour les éléments de la liste de tâches (Task Card) */
        .task-item {
            border-radius: 0.75rem; /* Rayon plus modéré */
            padding: 1rem 1.5rem; /* Padding interne */
            border: 1px solid #e9ecef; /* Bordure légère */
            transition: all 0.2s;
            cursor: pointer;
        }
        .task-item:hover {
            background-color: #f8f9fa !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        /* Centrage et max-width pour le conteneur principal */
        .main-card {
            max-width: 1200px; /* Augmenter la largeur pour le design desktop */
        }
        .search-input-group {
            max-width: 400px; /* Limiter la largeur de la recherche pour ne pas saturer */
        }

    </style>

    <main class="container-fluid bg-white shadow-lg py-5 px-4 rounded-3 mt-5 main-card mx-auto"> 
        
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-5 border-bottom pb-3">
            <div>
                <h1 class="display-6 fw-bold">Bonjour {{ auth()->user()->lastname[0]}}. {{ Str::ucfirst(auth()->user()->firstname)}}</h1> 
                <p class="text-muted fst-italic mb-0">
                    Prêt(e) pour une journée productive ? Il est {{ now()->format('H:i') }}.
                </p>
            </div>

            <div class="d-flex gap-3 mt-3 mt-md-0">
                <a href="{{route('all_tasks')}}" class="btn btn-outline-secondary">
                    <i class="bi bi-list-task me-1"></i> Toutes les tâches
                </a>
                <a href="{{route('create')}}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Nouvelle tâche
                </a>
            </div>
        </div>

        <section class="row mt-4 mb-5 g-4"> <div class="col-6 col-md-3"> <div class="card text-white bg-success p-4 shadow-sm border-0 card-custom"> <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <p class="h6 text-uppercase mb-1">Tâches du jour</p>
                            <div class="h3 fw-bold mb-0">{{count($taskToday)}}</div>
                        </div>
                        <i class="bi bi-watch display-6 opacity-75"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-6 col-md-3">
                <div class="card text-white bg-danger p-4 shadow-sm border-0 card-custom"> <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <p class="h6 text-uppercase mb-1">Tâches en retard</p>
                            <div class="h3 fw-bold mb-0">{{$lateTasks}}</div> 
                        </div>
                        <i class="bi bi-fire display-6 opacity-75"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-6 col-md-3">
                <div class="card text-dark bg-light p-4 shadow-sm border-0 card-custom">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <p class="h6 text-uppercase mb-1">Toutes les Tâches</p>
                            <div class="h3 fw-bold mb-0">{{count($tasks)}}</div>
                        </div>
                        <i class="bi bi-list-check display-6 text-secondary opacity-75"></i>
                    </div>
                </div>
            </div>
            
            @if (count($tasks) > 0)
                
            <div class="col-6 col-md-3">
                <div class="card text-white bg-purple p-4 shadow-sm border-0 card-custom">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <p class="h6 text-uppercase mb-1">Progression</p>
                            <div class="h3 fw-bold mb-0">{{ round(($doneTasks * 100) /count($tasks) ,2) }}%</div> </div>
                        <i class="bi bi-graph-up display-6 opacity-75"></i>
                    </div>
                </div>
            </div>
            @endif
        </section>

        <hr class="mt-4 mb-4"> 
        <h2 class="h3 fw-bold mb-4"><i class="bi bi-calendar-check me-2 text-primary"></i>Tâches Récentes</h2>
        
        <div class="mb-4">
            <form action="{{route('tasks.search')}}" method="GET">
                    <div class="input-group search-input-group">
                    @csrf
                    @method('GET')
                    <input type="search" name="search" id="searchInput" class="form-control" placeholder="Rechercher une tâche...">
                    <button class="btn btn-primary "  id='searchButton' type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
                </form>

                @if ($tasksResearch)
                    @if (count($tasksResearch) > 0)
                    <div class="container w-75 alert alert-success d-flex flex-row mb-4 mt-4" >
                        
                        <div class="d-flex flex-column me-auto gap-4">
                                <i class="text-center"> <h3 class="text-center"> Resultats de la recherche</h3> </i>
                                @foreach ($tasksResearch as $item) 
                                    <a href="{{route('all_tasks')}}" class="text-decoration-none">{{$item->taskTitle}}</a>
                                @endforeach
                            </div>

                            <button type="button" class="btn-close text-red" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                    @else
                        <div class="container alert alert-danger alert-dismissible w-50 mt-3 mb-3 d-flex flex-row fade show" id="noTasksAlert" role="alert">
                            <p class="text-black mb-0 me-auto">
                                <!-- Ajout de me-auto pour aligner le texte à gauche et pousser le bouton à droite -->
                                Oups ! Aucune tâche ne correspond à cette recherche 
                            </p>
                            <!-- Ajout de data-bs-dismiss="alert" pour activer le JS de Bootstrap -->
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    @endif
                @endif
        </div>

        <div id="tasklist">
            @if (count($tasks) > 0)
                <div class="list-group" id='tasklist'>
                @foreach (auth()->user()->tasks->take(5) as $task) <a href="#" class="list-group-item list-group-item-action task-item mb-3 d-flex justify-content-between align-items-center bg-light">
                        
                        <div class="fw-bold text-dark">
                            {{$task->taskTitle}}
                        </div>
                        
                        <div>
                            @if (\Carbon\Carbon::parse($task->taskDueDate)->isPast())
                                <span class="badge bg-danger me-2">En Retard</span>
                            @else
                                <span class="badge bg-info me-2">À faire</span>
                                @endif
                                
                            <span class="text-secondary small">
                                Échéance : **{{ \Carbon\Carbon::parse($task->taskDueDate)->format('d M') }}**
                            </span>
                        </div>
                    </a>
                @endforeach
                </div>
            @else
                <div class="alert alert-secondary text-center mt-4" role="alert">
                    <p class="h5 mb-2">Vous n'avez aucune tâche enregistrée.</p>
                    <a href="{{route('create')}}" class="alert-link">Créez-en une ici</a> pour commencer !
                </div>
            @endif
        </div>
    </main>
    <footer style="background-color: #6a4cee ; height:10 hv" class="mt-5">
        <div class="text-center">
            {{now()->format('Y')}} StepByStep
        </div>
    </footer>
    <script>
        

        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');

        if (searchInput && searchButton) {
            // Fonction pour gérer l'état du bouton
            function toggleSearchButtonState() {
                // Désactive le bouton si la valeur de l'input est vide ou ne contient que des espaces
                searchButton.disabled = searchInput.value.trim().length === 0;
            }

            // Définit l'état initial lors du chargement de la page
            toggleSearchButtonState();

            // Ajoute un écouteur d'événement 'input' (ou 'keyup') pour mettre à jour l'état en temps réel
            searchInput.addEventListener('input', toggleSearchButtonState);
        } else {
            console.error("L'un des éléments (ou les deux) n'a pas été trouvé.");
        }



    </script>
    <script src="/Bootstrap_5/js/bootstrap.min.js"></script>
</body>
</html>

</x-app-layout>