<nav x-data="{ open: false }" class="modern-nav">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --dark-color: #1e293b;
        }

        .modern-nav {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
        }

        /* Logo section */
        .nav-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-image {
            height: 45px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .logo-image:hover {
            transform: scale(1.05);
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 0.5px;
        }

        /* Navigation links */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9375rem;
            color: #64748b;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link i {
            font-size: 1.125rem;
        }

        .nav-link:hover {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .nav-link.active:hover {
            color: white;
        }

        /* User dropdown */
        .user-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-dropdown {
            position: relative;
        }

        .user-button {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.625rem 1.25rem;
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9375rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .user-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: white;
            color: var(--success-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
        }

        .dropdown-arrow {
            transition: transform 0.3s ease;
        }

        .user-button:hover .dropdown-arrow {
            transform: rotate(180deg);
        }

        /* Dropdown menu */
        .dropdown-menu {
            position: absolute;
            top: calc(100% + 0.5rem);
            right: 0;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            padding: 0.5rem;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            color: var(--dark-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .dropdown-link:hover {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            color: var(--primary-color);
        }

        .dropdown-link.logout {
            color: var(--danger-color);
        }

        .dropdown-link.logout:hover {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
        }

        /* Hamburger menu */
        .hamburger {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
        }

        .hamburger-icon {
            width: 24px;
            height: 2px;
            background: var(--dark-color);
            position: relative;
            transition: all 0.3s ease;
        }

        .hamburger-icon::before,
        .hamburger-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: var(--dark-color);
            transition: all 0.3s ease;
        }

        .hamburger-icon::before {
            top: -8px;
        }

        .hamburger-icon::after {
            bottom: -8px;
        }

        /* Mobile menu */
        .mobile-menu {
            display: none;
            background: white;
            border-top: 1px solid #e2e8f0;
            padding: 1rem;
        }

        .mobile-menu.active {
            display: block;
        }

        .mobile-nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem;
            border-radius: 12px;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .mobile-nav-link:hover,
        .mobile-nav-link.active {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            color: var(--primary-color);
        }

        .mobile-user-info {
            padding: 1rem;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
            border-radius: 12px;
            margin-bottom: 1rem;
        }

        .mobile-user-name {
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.25rem;
        }

        .mobile-user-email {
            font-size: 0.875rem;
            color: #64748b;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links,
            .user-section {
                display: none;
            }

            .hamburger {
                display: block;
            }

            .logo-text {
                font-size: 1.25rem;
            }

            .logo-image {
                height: 35px;
            }
        }
    </style>

    <!-- Desktop Navigation -->
    <div class="nav-container">
        <div class="nav-content">
            <!-- Logo -->
            <div class="nav-logo">
                <a href="{{ route('dashboard') }}">
                    <img src="{{asset('storage/photos/step_.png')}}" class="logo-image" alt="StepByStep Logo" />
                </a>
                <span class="logo-text">StepByStep</span>
            </div>

            <!-- Navigation Links (Desktop) -->
            <div class="nav-links">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
                <a href="{{ route('all_tasks') }}" class="nav-link {{ request()->routeIs('all_tasks') ? 'active' : '' }}">
                    <i class="bi bi-list-check"></i>
                    Mes Tâches
                </a>
                <a href="{{ route('create') }}" class="nav-link {{ request()->routeIs('create') ? 'active' : '' }}">
                    <i class="bi bi-plus-circle"></i>
                    Créer une tâche
                </a>
            </div>

            <!-- User Section (Desktop) -->
            <div class="user-section">
                <div class="user-dropdown" x-data="{ dropdownOpen: false }">
                    <button class="user-button" @click="dropdownOpen = !dropdownOpen">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->firstname, 0, 1)) }}{{ strtoupper(substr(Auth::user()->lastname, 0, 1)) }}
                        </div>
                        <span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                        <i class="bi bi-chevron-down dropdown-arrow"></i>
                    </button>
                    
                    <div class="dropdown-menu" :class="{ 'show': dropdownOpen }" @click.away="dropdownOpen = false">
                        <a href="{{ route('profile.edit') }}" class="dropdown-link">
                            <i class="bi bi-person-circle"></i>
                            Profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                            @csrf
                            <button type="submit" class="dropdown-link logout" style="width: 100%; border: none; background: none; text-align: left; cursor: pointer;">
                                <i class="bi bi-box-arrow-right"></i>
                                Se déconnecter
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger (Mobile) -->
            <button @click="open = !open" class="hamburger">
                <div class="hamburger-icon"></div>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" :class="{'active': open}">
        <!-- User Info -->
        <div class="mobile-user-info">
            <div class="mobile-user-name">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
            <div class="mobile-user-email">{{ Auth::user()->email }}</div>
        </div>

        <!-- Navigation Links -->
        <a href="{{ route('dashboard') }}" class="mobile-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>
        <a href="{{ route('all_tasks') }}" class="mobile-nav-link {{ request()->routeIs('all_tasks') ? 'active' : '' }}">
            <i class="bi bi-list-check"></i>
            Mes Tâches
        </a>
        <a href="{{ route('create') }}" class="mobile-nav-link {{ request()->routeIs('create') ? 'active' : '' }}">
            <i class="bi bi-plus-circle"></i>
            Créer une tâche
        </a>
        <a href="{{ route('profile.edit') }}" class="mobile-nav-link">
            <i class="bi bi-person-circle"></i>
            Profil
        </a>
        
        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
            @csrf
            <button type="submit" class="mobile-nav-link logout" style="width: 100%; border: none; background: none; text-align: left; color: #ef4444;">
                <i class="bi bi-box-arrow-right"></i>
                Se déconnecter
            </button>
        </form>
    </div>
</nav>