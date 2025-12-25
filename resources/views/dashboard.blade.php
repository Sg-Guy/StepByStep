<x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Gestionnaire de Tâches</title>
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

        .dashboard-container {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header moderne avec gradient */
        .dashboard-header {
            background: white;
            border-radius: 24px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .dashboard-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            border-radius: 50%;
            transform: translate(30%, -30%);
        }

        .welcome-text {
            position: relative;
            z-index: 1;
        }

        .welcome-text h1 {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .time-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            border-radius: 50px;
            font-weight: 600;
            color: var(--primary-color);
        }

        /* Boutons d'action modernisés */
        .action-buttons {
            position: relative;
            z-index: 1;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-modern {
            padding: 0.875rem 1.75rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
        }

        .btn-outline-modern {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-outline-modern:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        /* Cartes statistiques */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            opacity: 0.1;
            transform: translate(30%, -30%);
        }

        .stat-card.success::before {
            background: var(--success-color);
        }

        .stat-card.danger::before {
            background: var(--danger-color);
        }

        .stat-card.info::before {
            background: var(--info-color);
        }

        .stat-card.warning::before {
            background: var(--warning-color);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        .stat-card.success .stat-icon {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2) 0%, rgba(16, 185, 129, 0.1) 100%);
            color: var(--success-color);
        }

        .stat-card.danger .stat-icon {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2) 0%, rgba(239, 68, 68, 0.1) 100%);
            color: var(--danger-color);
        }

        .stat-card.info .stat-icon {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.2) 0%, rgba(6, 182, 212, 0.1) 100%);
            color: var(--info-color);
        }

        .stat-card.warning .stat-icon {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.2) 0%, rgba(245, 158, 11, 0.1) 100%);
            color: var(--warning-color);
        }

        .stat-label {
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark-color);
            line-height: 1;
        }

        /* Section recherche et tâches */
        .tasks-section {
            background: white;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .section-header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark-color);
            margin: 0;
        }

        .section-icon {
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

        /* Barre de recherche moderne */
        .search-wrapper {
            margin-bottom: 2rem;
        }

        .search-box {
            position: relative;
            max-width: 500px;
        }

        .search-box input {
            width: 100%;
            padding: 1rem 1.5rem;
            padding-right: 4rem;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .search-box button {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            padding: 0.75rem 1.25rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 12px;
            color: white;
            transition: all 0.3s ease;
        }

        .search-box button:hover {
            transform: translateY(-50%) scale(1.05);
        }

        /* Résultats de recherche */
        .search-results {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            border: 2px solid var(--success-color);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            position: relative;
        }

        .search-results h3 {
            color: var(--success-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .search-result-item {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .search-result-item:hover {
            border-color: var(--success-color);
            transform: translateX(8px);
        }

        .no-results {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
            border: 2px solid var(--danger-color);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        /* Liste de tâches */
        .task-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .task-item {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-item:hover {
            border-color: var(--primary-color);
            transform: translateX(8px);
            background: white;
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.15);
        }

        .task-title {
            font-weight: 700;
            font-size: 1.125rem;
            color: var(--dark-color);
        }

        .task-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .task-badge {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .task-badge.late {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2) 0%, rgba(239, 68, 68, 0.1) 100%);
            color: var(--danger-color);
        }

        .task-badge.todo {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.2) 0%, rgba(6, 182, 212, 0.1) 100%);
            color: var(--info-color);
        }

        .task-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #64748b;
            font-weight: 600;
        }

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
            background: var(--danger-color);
            color: white;
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

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }

            .dashboard-header {
                padding: 1.5rem;
            }

            .welcome-text h1 {
                font-size: 1.75rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .tasks-section {
                padding: 1.5rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-modern {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Header moderne -->
        <div class="dashboard-header">
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-4">
                <div class="welcome-text">
                    <h1>Bonjour {{ auth()->user()->lastname[0]}}. {{ Str::ucfirst(auth()->user()->firstname)}} 👋</h1>
                    <div class="time-badge">
                        <i class="bi bi-clock"></i>
                        <span>{{ now()->format('H:i') }} - Prêt(e) pour une journée productive ?</span>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="{{route('all_tasks')}}" class="btn btn-modern btn-outline-modern">
                        <i class="bi bi-list-task"></i>
                        Toutes les tâches
                    </a>
                    <a href="{{route('create')}}" class="btn btn-modern btn-primary-modern">
                        <i class="bi bi-plus-circle"></i>
                        Nouvelle tâche
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="stats-grid">
            <div class="stat-card success">
                <div class="stat-icon">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="stat-label">Tâches du jour</div>
                <div class="stat-value">{{count($taskToday)}}</div>
            </div>

            <div class="stat-card danger">
                <div class="stat-icon">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <div class="stat-label">En retard</div>
                <div class="stat-value">{{$lateTasks}}</div>
            </div>

            <div class="stat-card info">
                <div class="stat-icon">
                    <i class="bi bi-list-check"></i>
                </div>
                <div class="stat-label">Total des tâches</div>
                <div class="stat-value">{{count($tasks)}}</div>
            </div>

            @if (count($tasks) > 0)
            <div class="stat-card warning">
                <div class="stat-icon">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <div class="stat-label">Progression</div>
                <div class="stat-value">{{ round(($doneTasks * 100) /count($tasks) ,2) }}%</div>
            </div>
            @endif
        </div>

        <!-- Section Tâches -->
        <div class="tasks-section">
            <div class="section-header">
                <div class="section-icon">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <h2>Tâches Récentes</h2>
            </div>

            <!-- Barre de recherche -->
            <div class="search-wrapper">
                <form action="{{route('tasks.search')}}" method="GET">
                    @csrf
                    @method('GET')
                    <div class="search-box">
                        <input type="search" 
                               name="search" 
                               id="searchInput" 
                               placeholder="🔍 Rechercher une tâche...">
                        <button type="submit" id='searchButton'>
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Résultats de recherche -->
            @if ($tasksResearch)
                @if (count($tasksResearch) > 0)
                    <div class="search-results">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h3>
                                    <i class="bi bi-search"></i>
                                    Résultats de la recherche ({{count($tasksResearch)}})
                                </h3>
                                <div class="d-flex flex-column gap-2">
                                    @foreach ($tasksResearch as $item) 
                                        <a href="{{route('all_tasks')}}" class="search-result-item text-decoration-none text-dark fw-semibold">
                                            <i class="bi bi-arrow-right-circle me-2"></i>
                                            {{$item->taskTitle}}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <button type="button" class="close-btn" data-bs-dismiss="alert" aria-label="Close">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                @else
                    <div class="no-results alert alert-dismissible fade show" role="alert">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-search me-2"></i>
                                <strong>Oups !</strong> Aucune tâche ne correspond à cette recherche
                            </div>
                            <button type="button" class="close-btn" data-bs-dismiss="alert" aria-label="Close">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                @endif
            @endif

            <!-- Liste des tâches -->
            @if (count($tasks) > 0)
                <div class="task-list">
                    @foreach (auth()->user()->tasks->take(5) as $task)
                        <a href="#" class="task-item text-decoration-none">
                            <div class="task-title">
                                <i class="bi bi-file-text me-2"></i>
                                {{$task->taskTitle}}
                            </div>
                            
                            <div class="task-meta">
                                @if (\Carbon\Carbon::parse($task->taskDueDate)->isPast())
                                    <span class="task-badge late">
                                        <i class="bi bi-fire me-1"></i>
                                        En Retard
                                    </span>
                                @else
                                    <span class="task-badge todo">
                                        <i class="bi bi-clock me-1"></i>
                                        À faire
                                    </span>
                                @endif
                                
                                <span class="task-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ \Carbon\Carbon::parse($task->taskDueDate)->format('d M Y') }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <h3>Aucune tâche enregistrée</h3>
                    <p class="text-muted mb-3">Commencez par créer votre première tâche pour organiser votre travail</p>
                    <a href="{{route('create')}}" class="btn btn-modern btn-primary-modern">
                        <i class="bi bi-plus-circle"></i>
                        Créer ma première tâche
                    </a>
                </div>
            @endif
        </div>
    </div>

    <footer>
        <div>© {{now()->format('Y')}} StepByStep - Tous droits réservés</div>
    </footer>

    <script>
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');

        if (searchInput && searchButton) {
            function toggleSearchButtonState() {
                searchButton.disabled = searchInput.value.trim().length === 0;
            }

            toggleSearchButtonState();
            searchInput.addEventListener('input', toggleSearchButtonState);
        } else {
            console.error("L'un des éléments (ou les deux) n'a pas été trouvé.");
        }
    </script>
    <script src="/Bootstrap_5/js/bootstrap.min.js"></script>
</body>
</html>

</x-app-layout>