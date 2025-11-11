<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-width=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StepByStep | Construis ton avenir</title>
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        /* Conteneur principal: garantit la pleine hauteur pour le centrage vertical */
        .full-height-center {
            min-height: 100vh;
        }
        /* Assure que l'image ne dépasse jamais sa colonne */
        .responsive-img-container img {
            max-width: 100%;
            height: auto;
            border-radius: 1rem; /* Bords arrondis pour un look moderne */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <p class="text-uppercase text-primary h2 text-center mt-4 fw-bold mb-1">
                    Bienvenue sur StepByStep !
                </p>
                
    <div class="container full-height-center d-flex align-items-center justify-content-center">
        
        <div class="row w-100 g-5 align-items-center">
            
            <div class="col-12 col-md-6 text-center responsive-img-container order-2 order-md-1">
                <img src="{{asset('storage/photos/452140-PG1YNB-36.jpg')}}" alt="Illustration d'une personne construisant un avenir" class="img-fluid">
            </div>
            
            <div class="col-12 col-md-6 text-center text-md-start py-5 order-1 order-md-2">
                
                
                <h1 class="display-4 fw-bold mb-4">Construis ton avenir, pas à pas.</h1>
                
                <p class="lead mb-4 text-secondary">
                    Commence aujourd’hui. Progresser chaque jour. Réussir demain.
                    Notre plateforme est conçue pour t'aider à organiser et à atteindre tes objectifs les plus ambitieux.
                </p>
                
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 rounded-pill shadow-lg">
                    Commencer maintenant <i class="bi bi-arrow-right-circle ms-2"></i>
                </a>
            </div>
        </div>
    </div>
    
    <script src="/Bootstrap_5/js/bootstrap.bundle.min.js"></script>

</body>
</html>