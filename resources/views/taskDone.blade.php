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

        .error-alert p {
            margin: 0.5rem 0;
            color: var(--danger-color);
        }

        /* Alerte de succès */
        .success-alert {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
            border: 2px solid var(--warning-color);
            border-radius: 20px;
            padding: 1.25rem 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .success-alert p {
            margin: 0;
            color: var(--warning-color);
            font-weight: 600;
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

        .page-title {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .title-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
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
            text-decoration: none;
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
            color: var(--success-color);
            margin: 0;
        }

        .task-title.completed {
            text-decoration: line-through;
            opacity: 0.7;
        }

        /* Date */
        .task-date {
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Bouton de suppression */
        .btn-delete {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: 2px solid var(--danger-color);
            background: var(--danger-color);
            color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 1.125rem;
        }

        .btn-delete:hover {
            background: #dc2626;
            border-color: #dc2626;
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
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
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.05) 0%, rgba(6, 182, 212, 0.02) 100%);
            border-radius: 20px;
            border: 2px dashed var(--info-color);
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--info-color);
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #64748b;
            margin-bottom: 0;
        }

        /* Close button */
        .close-btn {
            background: white;
            border: 2px solid currentColor;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .close-btn:hover {
            transform: rotate(90deg);
            background: var(--warning-color);
            color: white;
            border-color: var(--warning-color);
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

            .page-title {
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

            .task-title {
                font-size: 1rem;
            }
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
    <div class="tasks-container">
        <!-- Alerte d'erreur -->
        @if ($errors->any())
            <div class="error-alert">
                <h4>
                    <i class="bi bi-x-octagon-fill"></i>
                    Erreurs de validation
                </h4>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="main-card">
            <!-- Header -->
            <div class="page-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="title-icon">
                        <i class="bi bi-funnel-fill"></i>
                    </div>
                    <h1 class="page-title">{{$title}}</h1>
                </div>
                <a href="{{route('create')}}" class="btn-create">
                    <i class="bi bi-plus-circle"></i>
                    Créer une nouvelle tâche
                </a>
            </div>

            <!-- Alerte de succès -->
            @if (session('succes'))
                <div class="success-alert alert alert-dismissible fade show">
                    <p>
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{session('succes')}}
                    </p>
                    <button type="button" class="close-btn" data-bs-dismiss="alert" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            @endif

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
                            <i class="bi bi-fire me-1"></i> Urgentes
                        </button>
                    </div>
                </form>
            </div>

            <!-- Titre section -->
            <div class="section-title">
                <div class="section-icon">
                    <i class="bi bi-check2-circle"></i>
                </div>
                <h2>{{$title}}</h2>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                @if (count($tasks) > 0)
                    <table class="table modern-table">
                        <thead>
                            <tr>
                                <th style="width: 5%;">État</th>
                                <th style="width: 50%;">Tâche</th>
                                <th style="width: 25%;">Date Création</th>
                                <th style="width: 20%;" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <!-- Checkbox -->
                                    <td>
                                        <input type="checkbox" 
                                               class="custom-checkbox form-check-input" 
                                               @if ($task->taskStatus == 'terminee')
                                                   @checked(true)
                                                   @disabled(true)
                                               @else
                                                   @checked(false)
                                                   @disabled(true)
                                               @endif>
                                    </td>

                                    <!-- Titre -->
                                    <td>
                                        <p class="task-title @if ($task->taskStatus == 'terminee') completed @endif">
                                            {{$task->taskTitle}}
                                        </p>
                                    </td>

                                    <!-- Date -->
                                    <td>
                                        <div class="task-date">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            {{ optional($task->created_at)->format('d/m/Y H:i') ?? $task->created_at }}
                                        </div>
                                    </td>

                                    <!-- Actions -->
                                    <td class="text-end">
                                        <form action="{{route('task.delete', $task->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn-delete" title="Supprimer">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Info footer -->
                    <div class="tasks-info">
                        <i class="bi bi-info-circle"></i>
                        <span>{{$message}}</span>
                    </div>
                @else
                    <!-- État vide -->
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <h3>{{$vide}}</h3>
                        <p>Essayez un autre filtre ou créez une nouvelle tâche</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <footer>
        <div>© {{now()->format('Y')}} StepByStep - Tous droits réservés</div>
    </footer>
    <script src="/Bootstrap_5/js/bootstrap.min.js"></script>
</body>
</x-app-layout>