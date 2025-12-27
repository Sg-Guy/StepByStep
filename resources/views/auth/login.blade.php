<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - StepByStep</title>
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --dark-color: #1e293b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        /* Particules flottantes */
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
        .login-container {
            max-width: 450px;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        /* Carte de connexion */
        .login-card {
            background: white;
            border-radius: 24px;
            padding: 3rem 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.6s ease;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.08) 0%, rgba(139, 92, 246, 0.08) 100%);
            border-radius: 50%;
            transform: translate(30%, -30%);
            z-index: 0;
        }

        .login-card > * {
            position: relative;
            z-index: 1;
        }

        /* Header */
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }

        .login-title {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: #64748b;
            font-size: 0.9375rem;
        }

        /* Form */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.75rem;
            font-size: 0.9375rem;
        }

        .label-icon {
            width: 20px;
            height: 20px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.15) 0%, rgba(139, 92, 246, 0.15) 100%);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 0.75rem;
        }

        .input-wrapper {
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

        .form-input {
            width: 100%;
            padding: 0.875rem 1.25rem 0.875rem 3.5rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .form-input:focus {
            background: white;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        /* Checkbox et liens */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .custom-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
            cursor: pointer;
        }

        .custom-checkbox label {
            font-size: 0.875rem;
            color: #64748b;
            cursor: pointer;
            margin: 0;
        }

        .forgot-link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .forgot-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        /* Bouton de connexion */
        .btn-login {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.0625rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
        }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid #f1f5f9;
        }

        .signup-text {
            color: #64748b;
            font-size: 0.9375rem;
        }

        .signup-link {
            color: var(--success-color);
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .signup-link:hover {
            color: #059669;
            text-decoration: underline;
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 576px) {
            body {
                padding: 1rem;
            }

            .login-card {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }

            .login-title {
                font-size: 1.75rem;
            }

            .logo {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }

            .form-options {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
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

    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="logo">
                    <i class="bi bi-check2-circle"></i>
                </div>
                <h1 class="login-title">Bienvenue !</h1>
                <p class="login-subtitle">Connectez-vous pour accéder à votre espace</p>
            </div>

            <!-- Formulaire -->
            <form method="POST" action="{{route('login')}}">
                @csrf
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <span class="label-icon">
                            <i class="bi bi-envelope"></i>
                        </span>
                        Email
                    </label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <i class="bi bi-at"></i>
                        </span>
                        <input 
                            id="email" 
                            class="form-input" 
                            type="email" 
                            name="email" 
                            required 
                            autofocus 
                            autocomplete="username" 
                            placeholder="votre@email.com"
                        />
                    </div>
                </div>

                <!-- Mot de passe -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        <span class="label-icon">
                            <i class="bi bi-lock"></i>
                        </span>
                        Mot de passe
                    </label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <i class="bi bi-key"></i>
                        </span>
                        <input 
                            id="password" 
                            class="form-input" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password" 
                            placeholder="••••••••"
                        />
                    </div>
                </div>

                <!-- Options -->
                <div class="form-options">
                    <div class="custom-checkbox">
                        <input type="checkbox" id="remember_me" name="remember">
                        <label for="remember_me">Se souvenir de moi</label>
                    </div>
                    <a class="forgot-link" href="{{route('password.request')}}">
                        Mot de passe oublié ?
                    </a>
                </div>

                <!-- Bouton de connexion -->
                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Connexion
                </button>
            </form>

            <!-- Footer -->
            <div class="login-footer">
                <span class="signup-text">Vous n'avez pas de compte ? </span>
                <a class="signup-link" href="{{route('register')}}">
                    Inscrivez-vous
                </a>
            </div>
        </div>
    </div>

    <script src="/Bootstrap_5/js/bootstrap.bundle.min.js"></script>
</body>
</html>