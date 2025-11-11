<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - StepByStep</title>
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/login_split_style.css"> 
    
    <style>
        /* CSS du conteneur principal pour le centrage vertical (si non géré par votre layout) */
        .full-screen-center {
            min-height: 100vh;
        }
        /* Style pour l'image (pour s'assurer qu'elle couvre bien l'espace) */
        .login-image-col img {
            object-fit: cover;
        }
    </style>
</head>
<body>
    
    <div class="container d-flex justify-content-center align-items-center full-screen-center">
        
        <div class="card shadow-lg border-0 overflow-hidden w-50 mx-auto login-card">
            


                <div class="login-form-col p-4 p-md-5">
                    
                    <h2 class="h3 fw-bold text-center mb-4 text-primary">
                        <i class="bi bi-person-circle me-2"></i> Connexion
                    </h2>

                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input id="email" class="form-control" type="email" name="email" required autofocus autocomplete="username" placeholder="Entrez votre email">
                            </div>
                            </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Mot de passe">
                            </div>
                             </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember_me" **name="remember"**>
                                <label class="form-check-label text-secondary small" for="remember_me">
                                    Se souvenir de moi
                                </label>
                            </div>

                            <a class="text-primary small text-decoration-none" href="{{route('password.request')}}">
                                Mot de passe oublié?
                            </a>
                        </div>

                        <div class="mb-4 text-center">
                            <span class="text-secondary small">Vous n'avez pas de compte ? </span>
                            <a class="text-success fw-bold small text-decoration-none" href="{{route('register')}}">
                                Inscrivez-vous
                            </a>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary btn-lg w-100">
                            Connexion
                        </button>
                    </form>
                    </div>
        </div>
    </div>

    <script src="/Bootstrap_5/js/bootstrap.bundle.min.js"></script>
</body>
</html>