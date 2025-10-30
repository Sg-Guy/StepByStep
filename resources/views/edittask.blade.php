<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenu sur votre Dashboard') }}
        </h2>
    </x-slot>



<head>
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
</head>
    <style>
       
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
            <i class="bi bi-list-task me-3"></i> Modification de tâche
        </h1>
        
        <form action="{{ route('update', $task->id)}}" method="POST">
        @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="taskTitle" class="form-label fw-bold">Titre de la Tâche <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-pencil-square"></i></span>
                    <input type="text" class="form-control form-control-lg" name="taskTitle" value="{{old('taskTitle' , $task->taskTitle)}}" placeholder="Ex: Finaliser le rapport trimestriel" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="taskDescription" class="form-label fw-bold">Description / Notes</label>
                <textarea class="form-control" name="taskDescription"  rows="3" placeholder="Détaillez les étapes ou les objectifs de la tâche...">{{old('taskDescription' , $task->taskDescription)}}</textarea>
            </div>

            <div class="row g-3 mb-4">
                
                <div class="col-lg-6">
                    <label for="taskDueDate" class="form-label fw-bold">Date et Heure d'échéance</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                        <input type="datetime-local" class="form-control" name="taskDueDate" value="{{old('taskDueDate' , $task->taskDueDate)}}">
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label for="taskCategory" class="form-label fw-bold">Catégorie</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                        <select class="form-select" name="taskCategory"  aria-label="Catégorie de la tâche">
                            <option selected>Sélectionner...</option>
                            <option value="1">Travail</option>
                            <option value="2">Personnel</option>
                            <option value="3">Urgent</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <label for="taskPriority" class="form-label fw-bold">Priorité</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-arrow-up-circle"></i></span>
                        <select class="form-select" name="taskPriority" value="{{old('taskPriority' , $task->taskPriority)}}" aria-label="Niveau de priorité">
                            <option value="1">Basse</option>
                            <option value="2" selected>Normale</option>
                            <option value="3">Haute</option>
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
                    <i class="bi bi-plus-circle me-2"></i> Appliquer
                </button>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</x-app-layout>
