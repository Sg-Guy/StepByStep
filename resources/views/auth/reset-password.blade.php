<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le Mot de Passe - StepByStep</title>
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --warning-color: #f59e0b;
            --dark-color: #1e293b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        .reset-container {
            max-width: 500px;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        /* Carte de réinitialisation */
        .reset-card {
            background: white;
            border-radius: 24px;
            padding: 3rem 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.6s ease;
        }

        .reset-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.08) 0%, rgba(217, 119, 6, 0.08) 100%);
            border-radius: 50%;
            transform: translate(30%, -30%);
            z-index: 0;
        }

        .reset-card > * {
            position: relative;
            z-index: 1;
        }

        /* Header */
        .reset-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
        }

        .reset-title {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .reset-subtitle {
            color: #64748b;
            font-size: 0.9375rem;
            line-height: 1.6;
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
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.15) 0%, rgba(217, 119, 6, 0.15) 100%);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--warning-color);
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
            color: var(--warning-color);
            font-size: 1.125rem;
            z-index: 10;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.15) 0%, rgba(217, 119, 6, 0.15) 100%);
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
            border-color: var(--warning-color);
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
            outline: none;
        }

        .form-input.is-invalid {
            border-color: #ef4444;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        /* Bouton de réinitialisation */
        .btn-reset {
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
            margin-top: 1.5rem;
        }

        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
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

            .reset-card {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }

            .reset-title {
                font-size: 1.75rem;
            }

            .logo {
                width: 70px;
                height: 70px;
                font-size: 2rem;
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

    <div class="reset-container">
        <div class="reset-card">
            <!-- Header -->
            <div class="reset-header">
                <div class="logo">
                    <i class="bi bi-key-fill"></i>
                </div>
                <h1 class="reset-title">Nouveau Mot de Passe</h1>
                <p class="reset-subtitle">
                    Veuillez entrer votre adresse email et choisir un nouveau mot de passe sécurisé.
                </p>
            </div>

            <!-- Formulaire -->
            <form method="POST" action="{{route('password.store')}}">
                @csrf
                <input type="hidden" name="token" value="{{$request->route('token')}}">

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
                            class="form-input @error('email') is-invalid @enderror" 
                            type="email" 
                            name="email" 
                            required 
                            autofocus 
                            autocomplete="username" 
                            placeholder="votre@email.com"
                            value="{{old('email')}}"
                        />
                    </div>
                    @error('email')
                        <div class="error-message">
                            <i class="bi bi-exclamation-circle"></i>
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <!-- Nouveau mot de passe -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        <span class="label-icon">
                            <i class="bi bi-lock"></i>
                        </span>
                        Nouveau Mot de Passe
                    </label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <i class="bi bi-key"></i>
                        </span>
                        <input 
                            id="password" 
                            class="form-input @error('password') is-invalid @enderror" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="new-password" 
                            placeholder="Minimum 8 caractères"
                        />
                    </div>
                    @error('password')
                        <div class="error-message">
                            <i class="bi bi-exclamation-circle"></i>
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <!-- Confirmer mot de passe -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        <span class="label-icon">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        Confirmer le Mot de Passe
                    </label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <i class="bi bi-shield-check"></i>
                        </span>
                        <input 
                            id="password_confirmation" 
                            class="form-input @error('password_confirmation') is-invalid @enderror" 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password" 
                            placeholder="Confirmez le nouveau mot de passe"
                        />
                    </div>
                    @error('password_confirmation')
                        <div class="error-message">
                            <i class="bi bi-exclamation-circle"></i>
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <!-- Bouton de réinitialisation -->
                <button type="submit" class="btn-reset">
                    <i class="bi bi-check-circle"></i>
                    Réinitialiser le mot de passe
                </button>
            </form>
        </div>
    </div>

    <script src="/Bootstrap_5/js/bootstrap.bundle.min.js"></script>
</body>
</html>