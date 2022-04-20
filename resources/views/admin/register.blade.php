<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectricDev Admin | New Account</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/register.css') }}">
</head>

<body>

    <div id="container">

        <h1>ElectricDev Register</h1>

        <form action="{{ route('admin.register') }}" method="POST">
            @csrf

            <div class="form-control">
                <label for="name">Nom</label><br>
                @error('name')
                <div class="error">{{$message}}</div>
                @enderror
                <input type="text" name="name" placeholder="KALIPE">
            </div>
            <div class="form-control">
                <label for="firstname">Prénoms</label><br>
                @error('firstname')
                <div class="error">{{$message}}</div>
                @enderror
                <input type="text" name="firstname" placeholder="kossi mathias">
            </div>
            <div class="form-control">
                <label for="email">Email</label><br>
                @error('email')
                <div class="error">{{$message}}</div>
                @enderror
                <input type="email" name="email" placeholder="kalipemathias4@gmail.com">
            </div>
            <div class="form-control">
                <label for="password">Mot de Passe</label><br>
                @error('password')
                <div class="error">{{$message}}</div>
                @enderror
                <input type="password" name="password" placeholder="password">
            </div>
            <div class="form-control">
                <label for="password_confirmation">Confirmation</label><br>
                @error('password_confirmation')
                <div class="error">{{$message}}</div>
                @enderror
                <input type="password" name="password_confirmation" placeholder="password">
            </div>
            <div class="form-action">
                <input type="submit" value="Enregistrer">
            </div>

        </form>

        <div class="snackbar">
            Le compte a été créé avec succès.
        </div>

        @if (session('user_created'))
        <script>
            const snack = document.querySelector('.snackbar')
            snack.classList.toggle('show')
            setTimeout(() => {
                snack.classList.toggle('show')
            }, 4000)
        </script>
        @endif
    </div>

</body>

</html>