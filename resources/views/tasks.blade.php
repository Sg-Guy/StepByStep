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

        .tasks-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Carte principale */
        .main-card {
            background: white;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        /* Header de la page */
        .page-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
        }

        /* Bouton créer */
        .btn-create {
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
            color: white;
        }

        /* Filtres */
        .filters-section {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .filter-label {
            font-size: 0.875rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--dark-color);
            margin-bottom: 1rem;
            letter-spacing: 0.5px;
        }

        .btn-filter {
            padding: 0.625rem 1.25rem;
            border-radius: 50px;
            border: 2px solid #e2e8f0;
            background: white;
            color: var(--dark-color);
            font-weight: 600;
            transition: all 0.3s ease;
            white-space: nowrap;
            cursor: pointer;
        }

        .btn-filter:hover {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            transform: translateY(-2px);
        }

        /* Section titre */
        .section-title {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .section-title h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin: 0;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        /* Table moderne */
        .modern-table {
            border-collapse: separate;
            border-spacing: 0 0.75rem;
        }

        .modern-table thead th {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            color: var(--dark-color);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: 1rem;
            border: none;
        }

        .modern-table thead th:first-child {
            border-radius: 12px 0 0 12px;
        }

        .modern-table thead th:last-child {
            border-radius: 0 12px 12px 0;
        }

        .modern-table tbody tr {
            background: white;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .modern-table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .modern-table tbody td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            border: none;
            background: inherit;
        }

        .modern-table tbody tr td:first-child {
            border-radius: 12px 0 0 12px;
        }

        .modern-table tbody tr td:last-child {
            border-radius: 0 12px 12px 0;
        }

        /* États des tâches */
        .modern-table tbody tr.task-done {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            opacity: 0.8;
        }

        .modern-table tbody tr.task-done td {
            text-decoration: line-through;
        }

        .modern-table tbody tr.task-progress {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(6, 182, 212, 0.05) 100%);
        }

        .modern-table tbody tr.task-paused {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
        }

        /* Checkbox personnalisé */
        .custom-checkbox {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            cursor: pointer;
            accent-color: var(--success-color);
        }

        /* Titre de tâche */
        .task-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--dark-color);
            margin: 0;
        }

        /* Date */
        .task-date {
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.375rem;
            justify-content: center;
        }

        /* Boutons d'action */
        .btn-action {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: 2px solid;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 1.125rem;
        }

        .btn-action:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-action.btn-edit {
            background: var(--info-color);
            border-color: var(--info-color);
            color: white;
        }

        .btn-action.btn-edit:hover {
            background: #0891b2;
            border-color: #0891b2;
        }

        .btn-action.btn-play {
            background: var(--success-color);
            border-color: var(--success-color);
            color: white;
        }

        .btn-action.btn-play:hover {
            background: #059669;
            border-color: #059669;
        }

        .btn-action.btn-pause {
            background: var(--warning-color);
            border-color: var(--warning-color);
            color: white;
        }

        .btn-action.btn-pause:hover {
            background: #d97706;
            border-color: #d97706;
        }

        .btn-action.btn-delete {
            background: var(--danger-color);
            border-color: var(--danger-color);
            color: white;
        }

        .btn-action.btn-delete:hover {
            background: #dc2626;
            border-color: #dc2626;
        }

        .btn-action.btn-complete {
            padding: 0.625rem 1.25rem;
            width: auto;
            height: auto;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 700;
            background: var(--success-color);
            border-color: var(--success-color);
            color: white;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .btn-action.btn-complete:hover {
            background: #059669;
            border-color: #059669;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        }

        .btn-action.btn-reopen {
            background: var(--info-color);
            border-color: var(--info-color);
            box-shadow: 0 2px 8px rgba(6, 182, 212, 0.3);
        }

        .btn-action.btn-reopen:hover {
            background: #0891b2;
            border-color: #0891b2;
            box-shadow: 0 4px 12px rgba(6, 182, 212, 0.4);
        }

        /* Footer info */
        .tasks-info {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            margin-top: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--dark-color);
            font-weight: 600;
        }

        .tasks-info i {
            color: var(--primary-color);
            font-size: 1.25rem;
        }

        /* État vide */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
            border-radius: 20px;
            border: 2px dashed #cbd5e1;
        }

        .empty-state i {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .empty-state a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }

        .empty-state a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .tasks-container {
                padding: 1rem;
                margin: 1rem auto;
            }

            .main-card {
                padding: 1.5rem;
                border-radius: 16px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-header h1 {
                font-size: 1.5rem;
            }

            .btn-create {
                width: 100%;
                justify-content: center;
            }

            .filters-section {
                padding: 1rem;
            }

            .modern-table {
                font-size: 0.875rem;
            }

            .modern-table tbody td {
                padding: 1rem 0.5rem;
            }

            .btn-action {
                width: 32px;
                height: 32px;
            }

            .task-title {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="tasks-container">
        <div class="main-card">
            <!-- Header -->
            <div class="page-header">
                <div>
                    <h1>📋 Mes Tâches</h1>
                </div>
                <a href="{{route('create')}}" class="btn-create">
                    <i class="bi bi-plus-circle"></i>
                    Créer une nouvelle tâche
                </a>
            </div>

            <!-- Filtres -->
            <div class="filters-section">
                <div class="filter-label">
                    <i class="bi bi-funnel me-2"></i>
                    Filtrer par
                </div>
                <form action="{{route('tasks.late')}}">
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" name="action_type" value="today" class="btn-filter">
                            <i class="bi bi-calendar-day me-1"></i> Aujourd'hui
                        </button>
                        <button type="submit" name="action_type" value="thisweek" class="btn-filter">
                            <i class="bi bi-calendar-week me-1"></i> Cette semaine
                        </button>
                        <button type="submit" name="action_type" value="done" class="btn-filter">
                            <i class="bi bi-check-circle me-1"></i> Terminées
                        </button>
                        <button type="submit" name="action_type" value="late" class="btn-filter">
                            <i class="bi bi-exclamation-triangle me-1"></i> En retard
                        </button>
                        <button type="submit" name="action_type" value="urgent" class="btn-filter">
                            <i class="bi bi-fire me-1"></i> Urgents
                        </button>
                    </div>
                </form>
            </div>

            <!-- Titre section -->
            <div class="section-title">
                <div class="section-icon">
                    <i class="bi bi-list-check"></i>
                </div>
                <h2>Liste des Tâches</h2>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                @if (count($tasks) != 0)
                    <table class="table modern-table">
                        <thead>
                            <tr>
                                <th style="width: 5%;">État</th>
                                <th style="width: 35%;">Tâche</th>
                                <th style="width: 15%;" class="text-center">Échéance</th>
                                <th style="width: 20%;"></th>
                                <th style="width: 25%;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->tasks as $task)
                                <tr class="
                                    @if($task->taskStatus=='terminee') task-done
                                    @elseif ($task->taskStatus=='en cours') task-progress
                                    @elseif ($task->taskStatus=='en pause') task-paused
                                    @endif
                                ">
                                    <!-- Checkbox -->
                                    <td>
                                        <input type="checkbox" 
                                               class="custom-checkbox form-check-input" 
                                               @if ($task->taskStatus=='terminee')
                                                   @checked(true)    
                                                   @disabled(true)
                                               @else  
                                                   @checked(false)
                                                   @disabled(true)
                                               @endif>
                                    </td>
                                    
                                    <!-- Titre -->
                                    <td>
                                        <p class="task-title">{{$task->taskTitle}}</p>
                                    </td>

                                    <!-- Date -->
                                    <td>
                                        <div class="task-date">
                                            <i class="bi bi-calendar3"></i>
                                            {{$task->taskDueDate}}
                                        </div>
                                    </td>

                                    <!-- Bouton terminer/rouvrir -->
                                    <td>
                                        @if ($task->taskStatus !='terminee') 
                                            <form action="{{route('task.status', $task->id)}}" method="post">
                                                @csrf
                                                @method('patch')
                                                <input type="text" name="taskStatus" hidden value="terminee">
                                                <button class="btn-action btn-complete" title="Terminer">
                                                    <i class="bi bi-check-circle me-1"></i>
                                                    Terminer
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{route('task.status', $task->id)}}" method="post">
                                                @csrf
                                                @method('patch')
                                                <input type="text" name="taskStatus" hidden value="en cours">
                                                <button class="btn-action btn-complete btn-reopen" title="Rouvrir">
                                                    <i class="bi bi-arrow-counterclockwise me-1"></i>
                                                    Rouvrir
                                                </button>
                                            </form>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            @if ($task->taskStatus == 'en pause')
                                                <!-- Éditer -->
                                                <a href="{{route('edite', $task->id)}}" 
                                                   class="btn-action btn-edit" 
                                                   title="Éditer">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                
                                                <!-- Démarrer -->
                                                <form action="{{route('task.status', $task->id)}}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="text" name="taskStatus" hidden value="en cours">
                                                    <button class="btn-action btn-play" title="Démarrer">
                                                        <i class="bi bi-play-fill"></i>
                                                    </button>
                                                </form>

                                            @elseif ($task->taskStatus == 'en cours')
                                                <!-- Éditer -->
                                                <a href="{{route('edite', $task->id)}}" 
                                                   class="btn-action btn-edit" 
                                                   title="Éditer">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                
                                                <!-- Pause -->
                                                <form action="{{route('task.status', $task->id)}}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="text" name="taskStatus" hidden value="en pause">
                                                    <button class="btn-action btn-pause" title="Mettre en pause">
                                                        <i class="bi bi-pause-fill"></i>
                                                    </button>
                                                </form>

                                            @else
                                                <!-- Éditer (disabled) -->
                                                <a href="{{route('edite', $task->id)}}" 
                                                   class="btn-action btn-edit" 
                                                   style="opacity: 0.5; pointer-events: none;" 
                                                   title="Éditer">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                
                                                <!-- Pause (disabled) -->
                                                <form action="{{route('task.status', $task->id)}}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="text" name="taskStatus" hidden value="en pause">
                                                    <button class="btn-action btn-pause" 
                                                            title="Mettre en pause" 
                                                            disabled 
                                                            style="opacity: 0.5; cursor: not-allowed;">
                                                        <i class="bi bi-pause-fill"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            <!-- Supprimer -->
                                            <form action="{{route('task.delete', $task->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn-action btn-delete" title="Supprimer">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Info footer -->
                    <div class="tasks-info">
                        <i class="bi bi-info-circle"></i>
                        <span>
                            Total de <strong>{{count($tasks)}}</strong> tâches, 
                            dont <strong>{{$lateTasks}}</strong> en retard.
                        </span>
                    </div>
                @else
                    <!-- État vide -->
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <h3>Aucune tâche pour le moment</h3>
                        <p class="text-muted mb-3">
                            Commencez par créer votre première tâche pour organiser votre travail
                        </p>
                        <a href="{{route('create')}}">Créer une tâche maintenant</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="/Bootstrap_5/js/bootstrap.min.js"></script>
</body>
</x-app-layout>