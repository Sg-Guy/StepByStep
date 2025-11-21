<x-app-layout>

    <head>
        @if ($errors->any())
        <div class="alert alert-danger mx-auto mt-3" role="alert" style="max-width: 1000px;">
            <h4 class="alert-heading">Erreurs de validation :</h4>
            @foreach ($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
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
        .page-container { /* Renommée 'page-container' pour éviter les conflits si vous utilisez déjà 'container' ailleurs */
            margin: 1rem !important; /* Marge réduite sur mobile */
            padding: 1rem !important;
        }
        @media (min-width: 992px) { /* Appliqué à partir des écrans larges (lg) */
            .page-container {
                margin: 3rem auto !important; /* Marge confortable sur desktop */
                padding: 3rem !important;
            }
        }
        /* Style pour les boutons de filtre modernes */
        .btn-filter {
            border-radius: 20px;
            border: 1px solid #dee2e6;
            padding: .5rem 1rem;
            white-space: nowrap; 
        }
        /* Réduit la largeur du champ de recherche sur mobile */
        .search-input-group {
            max-width: 100%; 
        }
        @media (min-width: 768px) {
            .search-input-group {
                max-width: 300px; 
            }
        }
        /* Style pour masquer le bouton d'action non utilisé dans la colonne */
        .hidden-th {
            width: 0;
            padding: 0 !important;
            border: none;
        }
    </style>

    <div class="page-container bg-white shadow-lg p-5 rounded-4 mt-4 card-container mx-auto">
        
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <h1 class="h2 mb-0 text-primary fw-bold">{{$title}}</h1> 
            
            <div class="input-group search-input-group">
                <input type="search" class="form-control" placeholder="Rechercher une tâche...">
                <button class="btn btn-primary" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
        
        <a href="{{route('create')}}" class="mt-4 mb-5 btn btn-primary rounded-pill w-100 w-md-auto px-4">
            <i class="bi bi-plus-circle me-2"></i> Créer une nouvelle tâche
        </a>
        
         <div class="d-flex flex-wrap gap-2 mb-5 p-2">
            <form action="{{route('tasks.late')}}">
                <button type="submit" name="action_type" value="today" class="btn btn-outline-secondary btn-filter active">Aujourd'hui</button>
                <button type="submit" name="action_type" value="thisweek" class="btn btn-outline-secondary btn-filter">Cette semaine</button>
                <button type="submit" name="action_type" value="done" class="btn btn-outline-secondary btn-filter">Terminées</button>
                <button type="submit" name="action_type" value="late" class="btn btn-outline-secondary btn-filter">En retard</button>

            </form>
        </div>
        
        <h2 class="h4 mb-3"><i class="bi bi-check2-circle text-success me-2"></i>{{$title}}</h2>
        
        <div class="table-responsive">

            @if (session('succes') )
                <div class="alert alert-warning d-flex flex-row">

                   <p class="me-auto">
                     {{session('succes')}}
                   </p>
                    <button type="button" class="btn-close text-red" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            @endif
            @if (count($tasks) > 0) <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 5%;">État</th> <th style="width: 50%;">Tâche</th> <th style="width: 25%;">Date Création</th> <th class="hidden-th"></th> 
                            <th style="width: 20%;" class="text-end">Actions</th> </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr class="table-success opacity-100"> <td> <input type="checkbox" class="form-check-input fs-4" checked disabled> </td> <td>
                                <p class="h5 mb-0 text-decoration-line-through text-success">{{$task->taskTitle}}</p>
                                @if (isset($task->description))
                                    <small class="text-muted fst-italic">{{ Str::limit($task->description, 50) }}</small>
                                @endif
                            </td>

                            <td class="text-center">
                                <p class="text-muted small mb-0">{{ optional($task->created_at)->format('d/m/Y H:i') ?? $task->created_at }}</p>
                            </td>

                            <td class="hidden-th"></td>

                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2"> 
                                    
                                    <form action="{{route('task.delete',$task->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" title="Supprimer">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <p class="text-muted mt-4 pt-3 border-top">
                    <i class="bi bi-info-circle me-1"></i>{{$message}}
                </p>
                
            @else
                <div class="alert alert-info text-center mt-5 p-4" role="alert">
                    <p class="h5 mb-2"><i class="bi bi-info-circle me-2"></i> Aucune tâche terminée pour le moment.</p>
                    <a href="{{route('create')}}" class="alert-link fw-bold">Cliquez ici pour créer votre première tâche.</a>
                </div>
            @endif
        </div>
        
    </div>
    <script src="/Bootstrap_5/js/bootstrap.min.js"></script>
</x-app-layout>