<x-app-layout>

<head>
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
            cursor: pointer;
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

        /* Badge d'avertissement */
        .warning-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
            border: 2px solid var(--warning-color);
            border-radius: 50px;
            color: var(--warning-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .warning-badge i {
            font-size: 1.25rem;
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
    @php
        if ($task->taskStatus=='terminee') {
            abort(403, "ACTION IMPOSSIBLE") ;
        }
    @endphp

    <div class="create-task-container">
        <!-- Carte de modification -->
        <div class="task-creation-card">
            <h1 class="page-title">
                <i class="bi bi-pencil-square"></i>
                Modification de tâche
            </h1>
            <p class="page-subtitle">
                Modifiez les informations de votre tâche
            </p>

            <form action="{{ route('update', $task->id)}}" method="POST">
                @csrf
                @method('PUT')

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
                           class="form-control form-control-lg " 
                           name="taskTitle" 
                           value="{{old('taskTitle', $task->taskTitle)}}" 
                           placeholder="Ex: Finaliser le rapport trimestriel" 
                           required>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="taskDescription" class="form-label">
                        <span class="label-icon">
                            <i class="bi bi-file-text"></i>
                        </span>
                        Description / Notes
                    </label>
                    <textarea class="form-control" 
                              name="taskDescription" 
                              rows="4" 
                              placeholder="Détaillez les étapes ou les objectifs de la tâche...">{{old('taskDescription', $task->taskDescription)}}</textarea>
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
                                       class="form-control" 
                                       name="taskDueDate" 
                                       value="{{old('taskDueDate', $task->taskDueDate)}}">
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
                                <select class="form-select" 
                                        name="taskCategory" 
                                        aria-label="Catégorie de la tâche">
                                    <option value="">Sélectionner...</option>
                                    <option value="1" @if(old('taskCategory', $task->taskCategory) == '1') selected @endif>💼 Travail</option>
                                    <option value="2" @if(old('taskCategory', $task->taskCategory) == '2') selected @endif>🏠 Personnel</option>
                                    <option value="3" @if(old('taskCategory', $task->taskCategory) == '3') selected @endif>🔥 Urgent</option>
                                </select>
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
                                    <option value="1" @if(old('taskPriority', $task->taskPriority) == '1') selected @endif>🟢 Basse</option>
                                    <option value="2" @if(old('taskPriority', $task->taskPriority) == '2') selected @endif>🟡 Normale</option>
                                    <option value="3" @if(old('taskPriority', $task->taskPriority) == '3') selected @endif>🔴 Haute</option>
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
                                <select class="form-select" 
                                        name="taskReminder" 
                                        aria-label="Rappel">
                                    <option value="0" @if(old('taskReminder', $task->taskReminder ?? '0') == '0') selected @endif>🔕 Pas de rappel</option>
                                    <option value="1" @if(old('taskReminder', $task->taskReminder ?? '0') == '1') selected @endif>⏰ 1 heure avant</option>
                                    <option value="2" @if(old('taskReminder', $task->taskReminder ?? '0') == '2') selected @endif>📅 1 jour avant</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="actions-footer">
                    <button type="button" class="btn-modern btn-outline-modern" onclick="window.history.back()">
                        <i class="bi bi-x-circle"></i>
                        Annuler
                    </button>
                    <button type="submit" class="btn-modern btn-primary-modern">
                        <i class="bi bi-check-circle"></i>
                        Appliquer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <div>© {{now()->format('Y')}} StepByStep - Tous droits réservés</div>
    </footer>
    <script src="/Bootstrap_5/js/bootstrap.bundle.min.js"></script>
</body>
</x-app-layout>