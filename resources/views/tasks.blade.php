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
            <button class="btn btn-outline-secondary btn-filter active">Aujourd'hui</button>
            <button class="btn btn-outline-secondary btn-filter">Cette semaine</button>
            <button class="btn btn-outline-secondary btn-filter">Terminées</button>
            <button class="btn btn-outline-secondary btn-filter">En retard</button>
        </div>
        
        <h2 class="h4 mb-3">Liste des Tâches</h2>
        
        <div class="table-responsive">

            @if (count($tasks) != 0)
                <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="col-1">État</th>
                        <th class="col-4">Tâche</th>
                        <th class="col-2 text-center">Échéance</th>
                        <!-- le th ci-dessous contient le bouton pour terminer la tâche qui n'est pas encore terminée-->
                        <th></th> 
                        <th class="col-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Recupération et manipulation des tâches liées à l'utilisateur connecté-->
                    @foreach (auth()->user()->tasks as $task)
                    <tr class="table-success opacity-75 @if ($task->taskStatus=='terminee')
                    text-decoration-line-through opacity-25 
                        @endif">

                         <!-- Si la tâche est terminée , le checkbox est à true et à false sinon-->
                        
                        <td><input type="checkbox" class="form-check-input fs-4" @if ($task->taskStatus=='terminee')
                                @checked(true)          

                            @else  

                                @checked(false)        
                            @endif ></td>
                            
                         <!-- Titre de la tache-->
                        <td>
                            <p class="h5 mb-0">{{$task->taskTitle}}</p>
                        </td>

                         <!-- Date de création de la tache-->
                        <td class="text-center">
                            <p class="text-muted small mb-0">{{$task->taskDueDate}}</p>
                        </td>


                         <!-- Actions à faire-->
                        <td>
                             <div>
                                <!--Si la tache est en cours ou en pause , on met un bouton pour la terminer-->
                                    @if ($task->taskStatus !='terminee') 
                                        <form action="{{route('task.status' , $task->id)}}" method="post">
                                            @csrf
                                            @method('patch')
                                            <input type="text" name="taskStatus" hidden value="terminee">
                                            <button class="btn btn-sm btn-success round" title="Terminer" >marquer comme terminée</button>
                                        </form>
                                    @endif
                                </div>
                        </td>

                        <td class="text-center">

                            <!-- Tache en pause-->
                            <div class="d-flex flex-row gap-2">

                            @if ($task->taskStatus == 'en pause')
                                <a href="{{route ('edite' , $task->id)}}" class="btn btn-sm btn-primary" title="Éditer" ><i class="bi bi-pencil"></i></a>
                            
                                <form action="{{route('task.status' , $task->id)}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="text" name="taskStatus" hidden value="en cours">
                                    <button class="btn btn-sm btn-success" title="Démarrer" ><i class="bi bi-play-fill"></i></button>
                                </form>
                            
                             <!-- Tache en cours-->
                           @elseif ($task->taskStatus == 'en cours')
                                <a href="{{route ('edite' , $task->id)}}" class="btn btn-sm btn-primary" title="Éditer" ><i class="bi bi-pencil"></i></a>
                            <form action="{{route('task.status' , $task->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <input type="text" name="taskStatus" hidden value="en pause">
                            <button class="btn btn-sm btn-success" title="Mettre en pause" ><i class="bi bi-pause-fill"></i></button>
                            </form>

                             <!-- Tache TERMINEE-->
                            @else
                            <a href="{{route ('edite' , $task->id)}}" class="btn btn-sm btn-primary disabled" title="Éditer" ><i class="bi bi-pencil"></i></a>
                            <form action="{{route('task.status' , $task->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <input type="text" name="taskStatus" hidden value="en pause">
                            <button class="btn btn-sm btn-success" title="Mettre en pause" disabled><i class="bi bi-pause-fill"></i></button>
                            </form>
                            @endif
                           
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
                 <i class="bi bi-info-circle me-1"></i> Total de {{count($tasks)}} Tâches, dont 2 en retard.
            </p>
            @else
                <p class="text-center h6"> Vous n'avez aucue tâche enrégistrée . <a href="{{route('create')}}">Créez-en une</a> </p>
            @endif
        </div>
        
        
    </div>
</x-app-layout>
