<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>ElectricDev | Admin-Login</title>
</head>

<body>
    <div id="container">


        <h1>ElectricDev</h1>


        <form action="{{ route('admin.login') }}" method="post">
            @csrf

            <p>Veuillez saisir vos identifiants pour vous
                connecter</p>

            <div class="form-control">

                <label for="email">Nom d'utilisateur</label>
                <input type="text" name="email" id="email" placeholder="mathias8dev@gmail.com">

                @error('email')
                <div class="error">{{$message}}</div>
                @enderror
            </div>


            <div class="form-control">

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="******">
            </div>

            <div>
                <input type="submit" value="Se Connecter">
            </div>
        </form>
    </div>
</body>

</html>