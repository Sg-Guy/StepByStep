<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StepByStep | Construis ton avenir</title>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow-x: hidden;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
        }

        /* Particules flottantes en arrière-plan */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 15s infinite;
        }

        .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { left: 20%; animation-delay: 2s; }
        .particle:nth-child(3) { left: 30%; animation-delay: 4s; }
        .particle:nth-child(4) { left: 40%; animation-delay: 6s; }
        .particle:nth-child(5) { left: 50%; animation-delay: 8s; }
        .particle:nth-child(6) { left: 60%; animation-delay: 10s; }
        .particle:nth-child(7) { left: 70%; animation-delay: 12s; }
        .particle:nth-child(8) { left: 80%; animation-delay: 14s; }

        @keyframes float {
            0% {
                transform: translateY(100vh) scale(0);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) scale(1);
                opacity: 0;
            }
        }

        /* Container principal */
        .welcome-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 1;
        }

        /* Header avec logo animé */
        .header-logo {
            text-align: center;
            padding: 2rem 0;
            animation: fadeInDown 0.8s ease;
        }

        .logo-text {
            font-size: 2rem;
            font-weight: 900;
            background: white;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: inline-block;
            position: relative;
        }

        .logo-text::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 4px;
            background: white;
            border-radius: 2px;
        }

        /* Contenu principal */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            padding: 2rem 1rem;
        }

        .content-wrapper {
            background: white;
            border-radius: 32px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .content-wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
            border-radius: 50%;
            z-index: 0;
        }

        .content-wrapper > * {
            position: relative;
            z-index: 1;
        }

        /* Image container avec effet */
        .image-container {
            position: relative;
            animation: fadeInLeft 1s ease;
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 24px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .image-container:hover img {
            transform: scale(1.05) rotate(2deg);
        }

        /* Décoration autour de l'image */
        .image-decoration {
            position: absolute;
            width: 100px;
            height: 100px;
            border: 4px solid rgba(99, 102, 241, 0.3);
            border-radius: 50%;
            z-index: -1;
        }

        .decoration-1 {
            top: -20px;
            left: -20px;
            animation: pulse 3s infinite;
        }

        .decoration-2 {
            bottom: -20px;
            right: -20px;
            animation: pulse 3s infinite 1.5s;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 0.5;
            }
            50% {
                transform: scale(1.1);
                opacity: 1;
            }
        }

        /* Contenu texte */
        .text-content {
            animation: fadeInRight 1s ease;
        }

        .main-title {
            font-size: 3rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .subtitle {
            font-size: 1.25rem;
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        /* Features cards */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        .feature-card {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
            padding: 1.5rem;
            border-radius: 16px;
            border: 2px solid #f1f5f9;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary-color);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.15);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .feature-title {
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .feature-text {
            font-size: 0.875rem;
            color: #64748b;
            margin: 0;
        }

        /* CTA Button */
        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.25rem 3rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.125rem;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(99, 102, 241, 0.5);
            color: white;
        }

        .cta-button:hover::before {
            width: 300px;
            height: 300px;
        }

        .cta-button i {
            transition: transform 0.3s ease;
        }

        .cta-button:hover i {
            transform: translateX(5px);
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .logo-text {
                font-size: 1.5rem;
            }

            .content-wrapper {
                padding: 2rem 1.5rem;
                border-radius: 24px;
            }

            .main-title {
                font-size: 2rem;
            }

            .subtitle {
                font-size: 1rem;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .cta-button {
                width: 100%;
                justify-content: center;
                padding: 1rem 2rem;
            }

            .image-container {
                margin-bottom: 2rem;
            }
        }

        /* Stats badge */
        .stats-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            border: 2px solid var(--success-color);
            border-radius: 50px;
            color: var(--success-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .stats-badge i {
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <!-- Particules d'arrière-plan -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="welcome-container">
        <!-- Header avec logo -->
        <div class="header-logo">
            <h1 class="logo-text">✨ StepByStep</h1>
        </div>

        <!-- Contenu principal -->
        <div class="main-content">
            <div class="container">
                <div class="content-wrapper">
                    <div class="row g-4 align-items-center">
                        <!-- Image -->
                        <div class="col-12 col-lg-5 order-2 order-lg-1">
                            <div class="image-container">
                                <div class="image-decoration decoration-1"></div>
                                <div class="image-decoration decoration-2"></div>
                                <img src="{{asset('storage/photos/step_.png')}}" 
                                     alt="Illustration d'une personne construisant un avenir" 
                                     class="img-fluid">
                            </div>
                        </div>

                        <!-- Texte -->
                        <div class="col-12 col-lg-7 order-1 order-lg-2">
                            <div class="text-content">
                                <div class="stats-badge">
                                    <i class="bi bi-trophy-fill"></i>
                                    <span>Plateforme #1 de gestion de tâches</span>
                                </div>

                                <h2 class="main-title">
                                    Construire son avenir, pas à pas.
                                </h2>

                                <p class="subtitle">
                                    Commencez aujourd'hui. Progressez chaque jour. Réussissez demain.
                                    Notre plateforme est conçue pour vous aider à organiser et à atteindre 
                                    vos objectifs les plus ambitieux.
                                </p>

                                <!-- Features -->
                                <div class="features">
                                    <div class="feature-card">
                                        <div class="feature-icon">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </div>
                                        <h3 class="feature-title">Simple</h3>
                                        <p class="feature-text">Interface intuitive et facile à utiliser</p>
                                    </div>

                                    <div class="feature-card">
                                        <div class="feature-icon">
                                            <i class="bi bi-lightning-charge-fill"></i>
                                        </div>
                                        <h3 class="feature-title">Rapide</h3>
                                        <p class="feature-text">Créez vos tâches en quelques secondes</p>
                                    </div>

                                    <div class="feature-card">
                                        <div class="feature-icon">
                                            <i class="bi bi-shield-check"></i>
                                        </div>
                                        <h3 class="feature-title">Sécurisé</h3>
                                        <p class="feature-text">Vos données sont protégées</p>
                                    </div>
                                </div>

                                <!-- CTA Button -->
                                <a href="{{ route('login') }}" class="cta-button">
                                    Commencer maintenant
                                    <i class="bi bi-arrow-right-circle-fill"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/Bootstrap_5/js/bootstrap.bundle.min.js"></script>
</body>
</html>