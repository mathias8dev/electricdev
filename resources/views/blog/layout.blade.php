<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectricDev | @yield('pageTitle')</title>
    <link rel="stylesheet" href="{{ asset('css/blog/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/layout.css') }}">
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

                        @foreach ($categories as $category)
                            <li><a
                                    href="{{ route('blog.category', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach

                        {{-- <li><a href="{{ route('blog.category.electronic') }}">Electronique</a></li>
                        <li><a href="{{ route('blog.category.computer_science') }}">Informatique</a></li>
                        <li><a href="{{ route('blog.category.programming') }}">Programmation</a></li> --}}
                    </ul>
                </li>
                <li><a href="/apropos">A propos</a></li>

            </ul>
        </nav>
    </header>


    <div id="content">

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
