<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenu sur votre Dashboard') }}
        </h2>
    </x-slot>


    
<head>
    <title>Créer une Nouvelle Tâche</title>
    
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
   
</head>
 <style>
        /* Dégradé de fond léger et moderne */
        
        /* Style du conteneur principal */
        .task-creation-card {
            max-width: 800px; /* Limite la largeur sur les grands écrans */
        }
        /* Style pour les champs d'input enrichis */
        .input-group-text {
            border-right: none;
            background-color: #e9ecef;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            border-color: #86b7fe;
        }

        
    </style>
    <div class="container task-creation-card bg-white shadow-lg p-md-5 p-4 rounded-4 mt-4">
        
        <h1 class="display-5 mb-4 text-primary fw-bold">
            <i class="bi bi-list-task me-3"></i> Nouvelle Tâche
        </h1>
        <p class="lead text-muted border-bottom pb-3 mb-4">
            Renseignez les informations pour planifier votre prochaine activité.
        </p>
        
        <form action="{{route('store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-4">
                <label for="taskTitle" class="form-label fw-bold">Titre de la Tâche <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-pencil-square"></i></span>
                    <input type="text" class="form-control form-control-lg" name="taskTitle" placeholder="Ex: Finaliser le rapport trimestriel" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="taskDescription" class="form-label fw-bold">Description / Notes</label>
                <textarea class="form-control" name="taskDescription" rows="3" placeholder="Détaillez les étapes ou les objectifs de la tâche..."></textarea>
            </div>

            <div class="row g-3 mb-4">
                
                <div class="col-lg-6">
                    <label for="taskDueDate" class="form-label fw-bold">Date et Heure d'échéance</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                        <input type="datetime-local" class="form-control" name="taskDueDate">
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label for="taskCategory" class="form-label fw-bold">Catégorie</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                        <select class="form-select" name="taskCategory" aria-label="Catégorie de la tâche">
                            <option selected>Sélectionner...</option>
                            <option value="travail">Travail</option>
                            <option value="personnel">Personnel</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <label for="taskPriority" class="form-label fw-bold">Priorité</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-arrow-up-circle"></i></span>
                        <select class="form-select" name="taskPriority" aria-label="Niveau de priorité">
                            <option value="basse">Basse</option>
                            <option value="normale" selected>Normale</option>
                            <option value="haute">Haute</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-5">
                <div class="col-lg-6">
                    <label for="taskReminder" class="form-label fw-bold">Définir un Rappel</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-bell"></i></span>
                        <select class="form-select" name="taskReminder" aria-label="Rappel">
                            <option selected value="0">Pas de rappel</option>
                            <option value="1">1 heure avant</option>
                            <option value="2">1 jour avant</option>
                        </select>
                    </div>
                </div>

                
            </div>

            <div class="d-flex justify-content-end gap-3 pt-3 border-top">
                <button type="button" class="btn btn-outline-secondary btn-lg rounded-pill px-4">
                    <i class="bi bi-x-circle me-2"></i> Annuler
                </button>
                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">
                    <i class="bi bi-plus-circle me-2"></i> Créer la Tâche
                </button>
            </div>

        </form>
    </div>

<script src="/Bootstrap_5/js/bootstrap.min.js"></script>
</x-app-layout>
