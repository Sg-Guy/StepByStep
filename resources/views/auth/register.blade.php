<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - StepByStep</title>
    
    <!-- Liens Bootstrap et Icônes (à ajuster selon votre chemin d'assets) -->
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
        /* CSS simple pour centrer la carte du formulaire */
        .full-screen-center {
            min-height: 100vh;
        }
        /* Limite la largeur du formulaire unique pour qu'il soit esthétique */
        .form-card {
            max-width: 550px; /* Légèrement plus large pour les noms/prénoms */
        }
    </style>
</head>
<body>
    
    <!-- CONTENEUR PRINCIPAL CENTRÉ -->
    <div class="container d-flex justify-content-center align-items-center full-screen-center py-5">
        
        <!-- CARTE DU FORMULAIRE -->
        <div class="card shadow-lg border-0 overflow-hidden w-100 mx-auto form-card">
            
            <!-- Corps de la Carte -->
            <div class="p-4 p-md-5">
                
                <h2 class="h3 fw-bold mb-4 text-success text-center">
                    <i class="bi bi-person-plus-fill me-2"></i> Créez votre compte
                </h2>
                
                <p class="text-center text-muted mb-4">
                    Rejoignez StepByStep pour construire votre avenir, un pas à la fois.
                </p>

                <!-- Début du Formulaire HTML pur -->
                <form method="POST" action="{{route('register')}}">
                    @csrf

                    <!-- Nom et Prénom (Sur la même ligne sur desktop) -->
                    <div class="row mb-3 g-3">
                        
                        <!-- Nom -->
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Nom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input id="lastname" class="form-control" type="text" name="lastname" required autofocus autocomplete="family-name" placeholder="Votre nom de famille">
                            </div>
                        </div>

                        <!-- Prénom -->
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Prénom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input id="firstname" class="form-control" type="text" name="firstname" required autocomplete="given-name" placeholder="Votre prénom">
                            </div>
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input id="email" class="form-control" type="email" name="email" required autocomplete="username" placeholder="votre@email.com">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Mot de passe">
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer le mot de passe">
                        </div>
                    </div>

                    <!-- Lien de Connexion et Bouton d'Inscription -->
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between mt-4">
                        
                        <!-- Lien de Connexion -->
                        <div class="text-center text-sm-start mb-3 mb-sm-0 small">
                            Avez-vous déjà un compte ?
                            <a class="text-primary fw-bold text-decoration-none" href="{{route('login')}}">
                                Connectez-vous
                            </a>
                        </div>
                        
                        <!-- Bouton d'Inscription -->
                        <button type="submit" class="btn btn-success btn-lg px-4">
                            S'inscrire <i class="bi bi-arrow-right-short"></i>
                        </button>
                    </div>
                </form>
                <!-- Fin du Formulaire -->

            </div>
        </div>
    </div>

    <script src="/Bootstrap_5/js/bootstrap.bundle.min.js"></script>
</body>
</html>