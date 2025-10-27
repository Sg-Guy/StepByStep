<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Tâches</title>
    
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
    
</head>
<style>
    /* Styles personnalisés pour la modernité et la cohérence */

/* Couleur personnalisée pour l'Objectif hebdomadaire */
.bg-purple {
    background-color: rgb(141, 3, 253) !important;
}

/* Rayon pour les cartes d'indicateurs (remplace le style inline) */
.card-custom {
    border-radius: 1rem; /* 16px */
}

/* Rayon pour les éléments de la liste de tâches (remplace le style inline) */
.task-item {
    border-radius: 2rem; /* 32px */
}

/* Style de la carte principale pour centrer */
.container-md {
    max-width: 800px; /* Limiter la largeur de la carte principale pour un meilleur look sur grand écran */
}

</style>

<body class="bg-light"> 
    
    <main class="container-md bg-white shadow-lg m-5 p-4 rounded-3 mx-auto">
        
        <div class="mb-4">
            <h1>Bonjour John, Prêt pour une journée productive ?</h1> 
            
            <p class="text-secondary small">
                Mardi, 14 Nov, 2024 - 22:30
            </p>

            <div class="d-flex flex-row justify-content-end me-2 gap-3">
                <a href="{{route('all_tasks')}}" class="btn btn-outline-secondary">
                    Voir toutes mes tâches
                </a>
                <a href="{{route('create')}}" class="btn btn-outline-primary">
                    Créer une nouvelle tâche
                </a>

            </div>
        </div>

        <section class="row mt-4 mb-5 g-3">
            
            <div class="col-sm-4"> 
                <div class="card text-center text-white bg-success bg-opacity-75 p-3 shadow-sm border-0 card-custom">
                   <div>
                            <p class="h5 m-0"><i class="bi bi-watch me-2"></i></i></p>
                    </div>
                    <div class="d-flex flex-column">
                        
                        <div>
                            Tâches du jour
                        </div>

                        <div class="text-center">
                            20
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="card text-center text-white bg-warning bg-opacity-75 p-3 shadow-sm border-0 card-custom">
                    <div>
                            <p class="h5 m-0"><i class="bi bi-fire me-2"></i></p>
                    </div>
                    <div class="d-flex flex-column">
                        
                        <div>
                            Tâches en retard
                        </div>

                        <div class="text-center">
                            19
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="card text-center text-white bg-purple p-3 shadow-sm border-0 card-custom">
                    <div>
                            <p class="h5 m-0"><i class="bi bi-percent me-2"></i></p>
                    </div>
                    <div class="d-flex flex-column">
                        
                        <div>
                            Objectif Hebdomadaire
                        </div>

                        <div class="text-center">
                           75%
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <hr> 
        <h2 class="mt-4 mb-3">Tâches Récentes</h2>
        
            <div class="input-group search-input-group mb-3 d-flex justify-content-end">
                <input type="search" class="form-control " placeholder="Rechercher une tâche...">
                <button class="btn btn-primary" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>

        <div>
            @foreach (auth()->user()->tasks as $task)   
                <p class="bg-light shadow-sm text-muted p-3 task-item mb-3"> 
                    {{$task->taskTitle}} - Échéance : {{$task->taskDueDate}}
                </p>
            @endforeach
        </div>
    </main>
    <script src="/public/Bootstrap_5/js/bootstrap.min.js"></script>
</body>
</html>