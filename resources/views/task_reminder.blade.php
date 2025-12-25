
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rappel</title>
</head>
<body>
    <h2>Rappel de tâche</h2>

<p>Bonjour {{ $task->user->name }},</p>

<p>Ceci est un rappel pour votre tâche :</p>

<strong>{{ $task->title }}</strong>

<p>Prévue pour : {{ $task->reminder_at }}</p>

<p>Merci d’utiliser notre application.</p>

</body>
</html>