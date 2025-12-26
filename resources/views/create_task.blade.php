<x-app-layout>
    
<head>
    <title>Créer une Nouvelle Tâche</title>
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #06b6d4;
            --dark-color: #1e293b;
            --light-bg: #f8fafc;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .create-task-container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Carte principale */
        .task-creation-card {
            background: white;
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .task-creation-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.08) 0%, rgba(139, 92, 246, 0.08) 100%);
            border-radius: 50%;
            transform: translate(30%, -30%);
            z-index: 0;
        }

        .task-creation-card > * {
            position: relative;
            z-index: 1;
        }

        /* Header */
        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 1.125rem;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f1f5f9;
        }

        /* Alerte d'erreur */
        .error-alert {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
            border: 2px solid var(--danger-color);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .error-alert h4 {
            color: var(--danger-color);
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .error-alert ul {
            margin: 0;
            padding-left: 1.5rem;
            color: var(--danger-color);
        }

        /* Labels */
        .form-label {
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.75rem;
            font-size: 0.9375rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label .required {
            color: var(--danger-color);
            font-size: 1.25rem;
        }

        .label-icon {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.15) 0%, rgba(139, 92, 246, 0.15) 100%);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
        }

        /* Champs de formulaire */
        .form-control, .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.875rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .form-control:focus, .form-select:focus {
            background: white;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        .form-control-lg {
            padding: 1rem 1.5rem;
            font-size: 1.125rem;
            font-weight: 600;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* Input groups avec icônes */
        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            font-size: 1.125rem;
            z-index: 10;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.15) 0%, rgba(139, 92, 246, 0.15) 100%);
            border-radius: 6px;
        }

        .input-group .form-control,
        .input-group .form-select {
            padding-left: 3.5rem;
        }

        /* Sections de formulaire */
        .form-section {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.03) 0%, rgba(139, 92, 246, 0.03) 100%);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Validation errors */
        .invalid-feedback {
            display: block;
            color: var(--danger-color);
            font-size: 0.875rem;
            margin-top: 0.5rem;
            font-weight: 600;
        }

        .is-invalid {
            border-color: var(--danger-color) !important;
        }

        /* Boutons d'action */
        .actions-footer {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 2px solid #f1f5f9;
        }

        .btn-modern {
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
            color: white;
        }

        .btn-outline-modern {
            background: white;
            color: #64748b;
            border: 2px solid #e2e8f0;
        }

        .btn-outline-modern:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            transform: translateY(-2px);
            color: #64748b;
        }

        /* Badges de priorité */
        .priority-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .create-task-container {
                padding: 1rem;
                margin: 1rem auto;
            }

            .task-creation-card {
                padding: 1.5rem;
                border-radius: 16px;
            }

            .page-title {
                font-size: 1.75rem;
            }

            .page-subtitle {
                font-size: 1rem;
            }

            .actions-footer {
                flex-direction: column;
            }

            .btn-modern {
                width: 100%;
                justify-content: center;
            }
        }

        /* Animation au chargement */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .task-creation-card {
            animation: fadeInUp 0.5s ease;
        }
        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 2rem;
            margin-top: 3rem;
            border-radius: 24px 24px 0 0;
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="create-task-container">
        <!-- Alerte d'erreur -->
        @if ($errors->any())
            <div class="error-alert">
                <h4>
                    <i class="bi bi-x-octagon-fill"></i>
                    Erreur(s) de soumission
                </h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Carte de création -->
        <div class="task-creation-card">
            <h1 class="page-title">
                <i class="bi bi-plus-circle-fill"></i>
                Nouvelle Tâche
            </h1>
            <p class="page-subtitle">
                Renseignez les informations pour planifier votre prochaine activité
            </p>

            <form action="{{route('store')}}" method="POST">
                @csrf
                @method('POST')

                <!-- Titre -->
                <div class="mb-4">
                    <label for="taskTitle" class="form-label">
                        <span class="label-icon">
                            <i class="bi bi-pencil-square"></i>
                        </span>
                        Titre de la Tâche
                        <span class="required">*</span>
                    </label>
                    <input type="text" 
                           class="form-control form-control-lg @error('taskTitle') is-invalid @enderror" 
                           name="taskTitle" 
                           placeholder="Ex: Finaliser le rapport trimestriel" 
                           value="{{ old('taskTitle') }}" 
                           required>
                    @error('taskTitle')
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="taskDescription" class="form-label">
                        <span class="label-icon">
                            <i class="bi bi-file-text"></i>
                        </span>
                        Description / Notes
                    </label>
                    <textarea class="form-control @error('taskDescription') is-invalid @enderror" 
                              name="taskDescription" 
                              rows="4" 
                              placeholder="Détaillez les étapes ou les objectifs de la tâche...">{{ old('taskDescription') }}</textarea>
                    @error('taskDescription')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Section Date et Catégorie -->
                <div class="form-section">
                    <div class="row g-3">
                        <!-- Date d'échéance -->
                        <div class="col-lg-6">
                            <label for="taskDueDate" class="form-label">
                                <span class="label-icon">
                                    <i class="bi bi-calendar-check"></i>
                                </span>
                                Date et Heure d'échéance
                            </label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="bi bi-calendar3"></i>
                                </span>
                                <input type="datetime-local" 
                                       class="form-control @error('taskDueDate') is-invalid @enderror" 
                                       name="taskDueDate" 
                                       value="{{ old('taskDueDate') }}">
                                @error('taskDueDate')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Catégorie -->
                        <div class="col-lg-6">
                            <label for="taskCategory" class="form-label">
                                <span class="label-icon">
                                    <i class="bi bi-tag"></i>
                                </span>
                                Catégorie
                            </label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="bi bi-tags"></i>
                                </span>
                                <select class="form-select @error('taskCategory') is-invalid @enderror" 
                                        name="taskCategory" 
                                        aria-label="Catégorie de la tâche">
                                    <option value="" @if(old('taskCategory') == '') selected @endif>Sélectionner...</option>
                                    <option value="travail" @if(old('taskCategory') == 'travail') selected @endif>💼 Travail</option>
                                    <option value="personnel" @if(old('taskCategory') == 'personnel') selected @endif>🏠 Personnel</option>
                                    <option value="urgent" @if(old('taskCategory') == 'urgent') selected @endif>🔥 Urgent</option>
                                </select>
                                @error('taskCategory')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Priorité et Rappel -->
                <div class="form-section">
                    <div class="row g-3">
                        <!-- Priorité -->
                        <div class="col-lg-6">
                            <label for="taskPriority" class="form-label">
                                <span class="label-icon">
                                    <i class="bi bi-arrow-up-circle"></i>
                                </span>
                                Priorité
                            </label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="bi bi-flag"></i>
                                </span>
                                <select class="form-select" 
                                        name="taskPriority" 
                                        aria-label="Niveau de priorité">
                                    <option value="basse" @if(old('taskPriority') == 'basse') selected @endif>🟢 Basse</option>
                                    <option value="normale" @if(old('taskPriority') == 'normale' || !old('taskPriority')) selected @endif>🟡 Normale</option>
                                    <option value="haute" @if(old('taskPriority') == 'haute') selected @endif>🔴 Haute</option>
                                </select>
                            </div>
                        </div>

                        <!-- Rappel -->
                        <div class="col-lg-6">
                            <label for="taskReminder" class="form-label">
                                <span class="label-icon">
                                    <i class="bi bi-bell"></i>
                                </span>
                                Définir un Rappel
                            </label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="bi bi-bell-fill"></i>
                                </span>
                                <input type="datetime-local" 
                                       class="form-control" 
                                       name="taskReminder">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="actions-footer">
                    <a href="{{ url()->previous() }}" class="btn-modern btn-outline-modern">
                        <i class="bi bi-x-circle"></i>
                        Annuler
                    </a>
                    <button type="submit" class="btn-modern btn-primary-modern">
                        <i class="bi bi-check-circle"></i>
                        Créer la Tâche
                    </button>
                </div>
            </form>
        </div>
    </div>

     <footer>
        <div>© {{now()->format('Y')}} StepByStep - Tous droits réservés</div>
    </footer>
    <script src="/Bootstrap_5/js/bootstrap.min.js"></script>
</body>
</x-app-layout>