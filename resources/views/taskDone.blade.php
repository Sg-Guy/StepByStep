<x-app-layout>


<head>
     @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">

</head>
    <style>
       
        /* Conteneur principal : moins de marge sur mobile, plus de marge sur desktop */
        .card-container {
            max-width: 1000px;
        }
        /* Ajustement des marges selon la taille de l'écran (Bootstrap responsive) */
        .container {
            margin: 1rem !important; /* Marge réduite sur mobile */
            padding: 1rem !important;
        }
        @media (min-width: 992px) { /* Appliqué à partir des écrans larges (lg) */
            .container {
                margin: 3rem auto !important; /* Marge confortable sur desktop */
                padding: 3rem !important;
            }
        }
        /* Style pour les boutons de filtre modernes */
        .btn-filter {
            border-radius: 20px;
            border: 1px solid #dee2e6;
            padding: .5rem 1rem;
            white-space: nowrap; /* Empêche les filtres de sauter à la ligne si possible */
        }
        /* Réduit la largeur du champ de recherche sur mobile */
        .search-input-group {
            max-width: 100%; /* S'adapte au conteneur parent */
        }
        @media (min-width: 768px) {
            .search-input-group {
                max-width: 300px; 
            }
        }
    </style>

    <div class="container bg-white shadow-lg p-5 rounded-4 mt-4 card-container">
        
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <h1 class="h2 mb-0">Mes Tâches</h1> 
            
            <div class="input-group search-input-group">
                <input type="search" class="form-control" placeholder="Rechercher une tâche...">
                <button class="btn btn-primary" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
        
        <!---->
        <a href="{{route('create')}}" class="mt-4 mb-5 btn btn-primary rounded-pill w-100 w-md-auto px-4">
            <i class="bi bi-plus-circle me-2"></i> Créer une nouvelle tâche
        </a>
        
        <div class="d-flex flex-wrap gap-2 mb-5 p-2">
            <button class="btn btn-outline-secondary btn-filter">Aujourd'hui</button>
            <button class="btn btn-outline-secondary btn-filter">Cette semaine</button>
            <button class="btn btn-outline-secondary btn-filter active">Terminées</button>
            <button class="btn btn-outline-secondary btn-filter">En retard</button>
        </div>
        
        <h2 class="h4 mb-3">Tâches Terminées</h2>
        
        <div class="table-responsive">

            @if (count($taskdone) != 0)
                <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="">État</th>
                        <th class="">Tâche</th>
                        <th class="">Échéance</th>
                        <!-- le th ci-dessous contient le bouton pour terminer la tâche qui n'est pas encore terminée-->
                        <th></th> 
                        <th class="">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Recupération et manipulation des tâches liées à l'utilisateur connecté-->
                    @foreach ($taskdone as $task)
                    <tr class=" opacity-75 
                    text-decoration-line-through opacity-25 ">
                        
                    <td>  <input type="checkbox" class="form-check-input fs-4" checked>  </td>
                    <!-- Titre de la tache-->
                        <td>
                            <p class="h5 mb-0">{{$task->taskTitle}}</p>
                        </td>

                         <!-- Date de création de la tache-->
                        <td class="text-center">
                            <p class="text-muted small mb-0">{{$task->created_at}}</p>
                        </td>


                         <!-- Actions à faire-->
                        

                        <td class="text-center">
                             <!-- Button de suppression pour chaque taches-->
                             <form action="{{route('task.delete',$task->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                    <button class="btn btn-sm btn-danger" title="Supprimer"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                        </tr>
                        @endforeach

                    </tbody>
            </table>
            <p class="text-muted mt-3 pt-3 border-top">
                 <i class="bi bi-info-circle me-1"></i> Total de {{count($taskdone)}} tâches terminées
            </p>
            @else
                <p class="text-center h6"> Vous n'avez aucue tâche enrégistrée . <a href="{{route('create')}}">Créez-en une</a> </p>
            @endif
        </div>
        
        
    </div>
</x-app-layout>
