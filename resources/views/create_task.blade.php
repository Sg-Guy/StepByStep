<x-app-layout>
    
    <head>
        <title>Créer une Nouvelle Tâche</title>
        
        <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
    </head>

    @if ($errors->any())
        <div class="alert alert-danger mx-auto mt-4 task-creation-card" role="alert" style="max-width: 800px;">
            <h4 class="alert-heading"><i class="bi bi-x-octagon-fill me-2"></i>Erreur(s) de soumission</h4>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <style>
        /* Conteneur principal: Limite la largeur et centre sur les grands écrans */
        .task-creation-card {
            max-width: 800px; 
            margin-left: auto;
            margin-right: auto;
        }
        /* Style des icônes dans les champs de formulaire pour l'esthétique */
        .input-group-text {
            border-right: none;
            background-color: #e9ecef; /* Couleur de fond clair */
            color: #6c757d; /* Couleur d'icône secondaire */
        }
        /* Style du focus amélioré (utilise le thème primaire de Bootstrap) */
        .form-control:focus, .form-select:focus, .form-control-lg:focus {
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
                    <input type="text" class="form-control form-control-lg @error('taskTitle') is-invalid @enderror" 
                           name="taskTitle" 
                           placeholder="Ex: Finaliser le rapport trimestriel" 
                           value="{{ old('taskTitle') }}" 
                           required>
                    @error('taskTitle')
                        <div class="invalid-feedback d-block">{{ $message }}</div> 
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="taskDescription" class="form-label fw-bold">Description / Notes</label>
                <textarea class="form-control @error('taskDescription') is-invalid @enderror" 
                          name="taskDescription" 
                          rows="3" 
                          placeholder="Détaillez les étapes ou les objectifs de la tâche...">{{ old('taskDescription') }}</textarea>
                @error('taskDescription')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-3 mb-4">
                
                <div class="col-lg-6">
                    <label for="taskDueDate" class="form-label fw-bold">Date et Heure d'échéance</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                        <input type="datetime-local" class="form-control @error('taskDueDate') is-invalid @enderror" 
                               name="taskDueDate" 
                               value="{{ old('taskDueDate') }}">
                        @error('taskDueDate')
                            <div class="invalid-feedback d-block"> {{$message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label for="taskCategory" class="form-label fw-bold">Catégorie</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                        <select class="form-select @error('taskCategory') is-invalid @enderror" name="taskCategory" aria-label="Catégorie de la tâche">
                            <option value="" @if(old('taskCategory') == '') selected @endif>Sélectionner...</option>
                            <option value="travail" @if(old('taskCategory') == 'travail') selected @endif>Travail</option>
                            <option value="personnel" @if(old('taskCategory') == 'personnel') selected @endif>Personnel</option>
                            <option value="urgent" @if(old('taskCategory') == 'urgent') selected @endif>Urgent</option>
                        </select>
                        @error('taskCategory')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <label for="taskPriority" class="form-label fw-bold">Priorité</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-arrow-up-circle"></i></span>
                        <select class="form-select" name="taskPriority" aria-label="Niveau de priorité">
                            <option value="basse" @if(old('taskPriority') == 'basse') selected @endif>Basse</option>
                            <option value="normale" @if(old('taskPriority') == 'normale' || !old('taskPriority')) selected @endif>Normale</option>
                            <option value="haute" @if(old('taskPriority') == 'haute') selected @endif>Haute</option>
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
                            <option value="0" @if(old('taskReminder') == '0') selected @endif>Pas de rappel</option>
                            <option value="1" @if(old('taskReminder') == '1') selected @endif>1 heure avant</option>
                            <option value="24" @if(old('taskReminder') == '24') selected @endif>1 jour avant</option> </select>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-3 pt-3 border-top">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4">
                    <i class="bi bi-x-circle me-2"></i> Annuler
                </a>
                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">
                    <i class="bi bi-plus-circle me-2"></i> Créer la Tâche
                </button>
            </div>

        </form>
    </div>

<script src="/Bootstrap_5/js/bootstrap.min.js"></script>
</x-app-layout>