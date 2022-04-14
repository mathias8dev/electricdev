<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectricDev | @yield('pageTitle')</title>
    <link rel="stylesheet" href="{{ asset('css/blog/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/menu.css') }}">
    @yield('headers')

</head>



<body>

    {{-- Menu of my blog app --}}
    <header>
        <h1 class="blog-name">ElectricDev</h1>
        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li class="submenu-container"><a href="/">Catégories</a>
                    <ul>
                        <li><a href="{{ route('category.electronic') }}">Electronique</a></li>
                        <li><a href="{{ route('category.computer_science') }}">Informatique</a></li>
                        <li><a href="{{ route('category.programming') }}">Programmation</a></li>
                    </ul>
                </li>
                <li><a href="/apropos">A propos</a></li>
            </ul>
        </nav>
    </header>


    <div class="content">

        @yield('content')
    </div>


    {{-- My footer page --}}
    <footer>
        ©️Copyrights {{ (new DateTime())->format('Y') }}
    </footer>

    @section('js')
        <script src="{{ asset('js/blog/menu.js') }}"></script>
    @show
</body>

</html>
