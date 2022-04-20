<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('pageTitle')</title>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/menu.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('headers')

</head>

<body>

<nav>
        <h3><i class="fa-solid fa-laptop"></i>
            <li><a href="#">ElectricDev</a></li>
        </h3>

        <!-- 
            The menu is like that
            Home
            Users
                New
                Liste
            ARticles
                New
                Liste
            Categories
                New
                Liste
            Logout

         -->
        <ul>
            <li class="active"><a href="{{ route('blog.home') }}"><i class="fas fa-home"></i><span>Accueil</span></a></li>
            <li><a href="{{ route('admin.users') }}"><i class="fas fa-user"></i><span>Utilisateurs</span></a></li>
            <li><a href="/pages/new/categories.html"><i class="fa-solid fa-layer-group"></i><span>Catégories</span></a>
            </li>
            <li><a href="/pages/new/articles.html"><i class="fa-solid fa-newspaper"></i><span>Articles</span></a></li>
            <li><a href="/pages/new/logout.html"><i
                        class="fa-solid fa-right-from-bracket"></i><span>Déconnexion</span></a></li>
        </ul>
    </nav>

    <div id="content">
        @yield('content')
    </div>


    <script src="{{ asset('js/admin/home.js') }}"></script>
</body>

</html>