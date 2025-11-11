<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le Mot de Passe</title>
    
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
            max-width: 500px;
        }
    </style>
</head>
<body>
    
    <!-- CONTENEUR PRINCIPAL : Centre la carte sur tout l'écran -->
    <div class="container d-flex justify-content-center align-items-center full-screen-center py-5">
        
        <!-- CARTE DU FORMULAIRE : Style moderne avec ombre et bords arrondis -->
        <div class="card shadow-lg border-0 overflow-hidden w-100 mx-auto form-card">
            
            <!-- Corps de la Carte avec padding responsive -->
            <div class="p-4 p-md-5">
                
                <!-- TITRE DE LA PAGE -->
                <h2 class="h3 fw-bold mb-4 text-warning text-center">
                    <i class="bi bi-key-fill me-2"></i> Nouveau Mot de Passe
                </h2>

                <!-- DESCRIPTION -->
                <p class="text-center text-muted mb-4 small">
                    Veuillez entrer votre adresse email et choisir un nouveau mot de passe sécurisé.
                </p>

                <!-- DÉBUT DU FORMULAIRE HTML PUR -->
                <form method="POST" action="{{route('password.store')}}">
                    @csrf
                    <!-- 
                    CHAMP CACHÉ : JETON DE RÉINITIALISATION (TOKEN)
                    Ceci est essentiel pour valider la réinitialisation côté serveur. 
                    Dans Laravel, la valeur serait récupérée de $request->route('token').
                    -->
                    <!-- Remplacez 'VALEUR_DU_TOKEN' par la variable PHP réelle ou la valeur passée dans l'URL. -->
                    <input type="hidden" name="token" value="{{$request->route('token')}}">
                    <!-- Remplacez ceci par le champ token CSRF réel -->
                    <!-- <input type="hidden" name="_token" value="VOTRE_TOKEN_CSRF"> -->

                    <!-- CHAMP EMAIL -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <!-- Le champ doit être pré-rempli avec l'email si possible -->
                            <input id="email" class="form-control @error('email')
                                is-inavlid
                            @enderror" type="email" name="email" required autofocus autocomplete="username" placeholder="Entrez votre email" value="{{old('email')}}">
                        </div>
                        @error('email')
                            <div class="text-danger small">{{$message}}</div>
                        @enderror
                         <!-- Espace pour l'affichage d'erreurs d'email -->
                    </div>

                    <!-- CHAMP NOUVEAU MOT DE PASSE -->
                    <div class="mb-3 mt-4">
                        <label for="password" class="form-label ">Nouveau Mot de Passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <!-- L'attribut 'name' doit être 'password' -->
                            <input id="password" class="form-control @error('password')
                            is-invalid
                        @enderror" type="password" name="password" required autocomplete="new-password" placeholder="Minimum 8 caractères">
                        </div>
                        @error('password')
                            <div class="text-danger small">{{$message}}</div>
                        @enderror
                        <!-- Espace pour l'affichage d'erreurs de mot de passe -->
                    </div>

                    <!-- CHAMP CONFIRMATION MOT DE PASSE -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirmer le Mot de Passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <!-- L'attribut 'name' doit être 'password_confirmation' -->
                            <input id="password_confirmation" class="form-control @error('password_confirmation')
                            is-invalid
                        @enderror" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmez le nouveau mot de passe">
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger small">{{$message}}</div>
                        @enderror
                        
                        <!-- Espace pour l'affichage d'erreurs de confirmation -->
                    </div>

                    <!-- BOUTON DE SOUMISSION -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Réinitialiser le mot de passe
                        </button>
                    </div>
                </form>
                <!-- FIN DU FORMULAIRE -->

            </div>
        </div>
    </div>

    <script src="/Bootstrap_5/js/bootstrap.bundle.min.js"></script>
</body>
</html>