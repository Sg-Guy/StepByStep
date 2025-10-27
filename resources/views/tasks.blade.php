<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Tâches</title>
    
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">

</head>
    <style>
        /* Dégradé de fond plus doux */
        body {
            background: linear-gradient(135deg, #f3f6ff 0%, #e8ecf8 100%);
        }
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

<body>
    <div class="container bg-white shadow-lg p-5 rounded-4 mx-auto card-container">
        
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
            <h1 class="h2 mb-0">Mes Tâches</h1> 
            
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
            <button class="btn btn-outline-secondary btn-filter active">Aujourd'hui</button>
            <button class="btn btn-outline-secondary btn-filter">Cette semaine</button>
            <button class="btn btn-outline-secondary btn-filter">Terminées</button>
            <button class="btn btn-outline-secondary btn-filter">En retard</button>
        </div>
        
        <h2 class="h4 mb-3">Liste des Tâches</h2>
        
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="col-1">État</th>
                        <th class="col-4">Tâche</th>
                        <th class="col-2 text-center">Échéance</th>
                        <th class="col-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (auth()->user()->tasks as $task)
                        <tr class="table-success opacity-75">
                        <td><input type="checkbox" class="form-check-input fs-4" checked></td>
                            
                        <td>
                            <div>
                                @if ($task->id==1)
                                 <p class="h5 mb-0 text-decoration-line-through">{{$task->taskTitle}}</p>
                                @else
                                 <p class="h5 mb-0">{{$task->taskTitle}}</p>
                                @endif 
                            </div>
                        </td>
                        <td class="text-center">
                            <p class="text-muted small mb-0">{{$task->created_at}}</p>
                        </td>
                        <td class="text-center">
                            <div class="d-flex flex-row gap-2">
                                <a href="{{route ('edite' , $task->id)}}" class="btn btn-sm btn-primary" title="Éditer" ><i class="bi bi-pencil"></i></a>
                            

                            @if ($task->taskStatus == 'en pause')
                            <form action="{{route('task.status' , $task->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <input type="text" name="taskStatus" hidden value="en cours">
                                <button class="btn btn-sm btn-success" title="Démarrer" ><i class="bi bi-play-fill"></i></button>
                            </form>
                                
                            @else
                            <form action="{{route('task.status' , $task->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <input type="text" name="taskStatus" hidden value="en pause">
                            <button class="btn btn-sm btn-success" title="Mettre en pause" ><i class="bi bi-pause-fill"></i></button>
                            </form>
                                
                            @endif
                           
                                <form action="{{route('delete' , $task->id)}}" method="POST">
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
        </div>
        
        <p class="text-muted mt-3 pt-3 border-top">
            <i class="bi bi-info-circle me-1"></i> Total de 6 Tâches, dont 2 en retard.
        </p>
    </div>
</body>
</html>