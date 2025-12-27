<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de Passe Oublié - StepByStep</title>
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --info-color: #06b6d4;
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
        .forgot-container {
            max-width: 500px;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        /* Carte */
        .forgot-card {
            background: white;
            border-radius: 24px;
            padding: 3rem 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.6s ease;
        }

        .forgot-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.08) 0%, rgba(8, 145, 178, 0.08) 100%);
            border-radius: 50%;
            transform: translate(30%, -30%);
            z-index: 0;
        }

        .forgot-card > * {
            position: relative;
            z-index: 1;
        }

        /* Header */
        .forgot-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, var(--info-color) 0%, #0891b2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 8px 20px rgba(6, 182, 212, 0.3);
        }

        .forgot-title {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--info-color) 0%, #0891b2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .forgot-subtitle {
            color: #64748b;
            font-size: 0.9375rem;
            line-height: 1.8;
            text-align: left;
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.05) 0%, rgba(8, 145, 178, 0.05) 100%);
            padding: 1rem 1.25rem;
            border-radius: 12px;
            border-left: 4px solid var(--info-color);
        }

        /* Alert de succès */
        .success-alert {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            border: 2px solid var(--success-color);
            border-radius: 16px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--success-color);
            font-weight: 600;
        }

        .success-alert i {
            font-size: 1.5rem;
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
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.15) 0%, rgba(8, 145, 178, 0.15) 100%);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--info-color);
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
            color: var(--info-color);
            font-size: 1.125rem;
            z-index: 10;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.15) 0%, rgba(8, 145, 178, 0.15) 100%);
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
            border-color: var(--info-color);
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.1);
            outline: none;
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

        /* Bouton */
        .btn-send {
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

        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
        }

        /* Footer */
        .forgot-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid #f1f5f9;
        }

        .back-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9375rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-link:hover {
            color: var(--secondary-color);
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

            .forgot-card {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }

            .forgot-title {
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

    <div class="forgot-container">
        <div class="forgot-card">
            <!-- Header -->
            <div class="forgot-header">
                <div class="logo">
                    <i class="bi bi-question-circle"></i>
                </div>
                <h1 class="forgot-title">Mot de passe oublié ?</h1>
                <div class="forgot-subtitle">
                    <i class="bi bi-info-circle me-2"></i>
                    Pas de panique. Veuillez nous notifier votre email et nous vous enverrons un lien de réinitialisation qui vous permet de choisir un autre mot de passe.
                </div>
            </div>

            <!-- Alert de succès (si le lien a été envoyé) -->
            @if (session('status'))
                <div class="success-alert">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <!-- Formulaire -->
            <form method="POST" action="{{ route('password.email') }}">
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
                            value="{{ old('email') }}"
                            required 
                            autofocus 
                            placeholder="votre@email.com"
                        />
                    </div>
                    @error('email')
                        <div class="error-message">
                            <i class="bi bi-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Bouton d'envoi -->
                <button type="submit" class="btn-send">
                    <i class="bi bi-send-fill"></i>
                    Recevoir le lien de réinitialisation
                </button>
            </form>

            <!-- Footer -->
            <div class="forgot-footer">
                <a class="back-link" href="{{ route('login') }}">
                    <i class="bi bi-arrow-left-circle"></i>
                    Retour à la connexion
                </a>
            </div>
        </div>
    </div>

    <script src="/Bootstrap_5/js/bootstrap.bundle.min.js"></script>
</body>
</html>