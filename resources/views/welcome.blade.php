<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StepByStep</title>
    <link rel="stylesheet" href="/Bootstrap_5/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex flex-row align-items-center w-50">
        <div class="w-50  " >
            <img class="" src="{{asset('storage/photos/452140-PG1YNB-36.jpg')}}" alt="img" style="max-width: 90% ; ">
        </div>
        <div class="text-center py-5 w-50">
            <h1 class="fw-bold mb-3">Construis ton avenir, pas à pas.</h1>
            <p class="mb-4">
                Commence aujourd’hui. Progresser chaque jour. Réussir demain.
            </p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                Commencer maintenant.
            </a>
        </div>
    </div>
</body>
</html>