<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('pageTitle')</title>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/layout.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">


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
            <li @class(['active'=>url()->current() === route('blog.home'), "first" => 1])><a href="{{ route('blog.home') }}"><i class="fas fa-home"></i><span>Home</span></a></li>
            <li class="submenu-holder">
                <div><i class="fas fa-user"></i><span>Users</span></div>
                <ul>
                    <li @class(['active'=>url()->current() === route('admin.users.list')])><a href="{{ route('admin.users.list') }}">Users</a></li>
                    <li @class(['active'=>url()->current() === route('admin.users.new')])><a href="{{ route('admin.users.new') }}">New User</a></li>
                </ul>
            </li>
            <li class="submenu-holder">
                <div><i class="fa-solid fa-layer-group"></i><span>Categories</span></div>
                <ul>
                    <li @class(['active'=>url()->current() === route('admin.categories.list')])><a href="{{ route('admin.categories.list') }}">Categories</a></li>
                    <li @class(['active'=>url()->current() === route('admin.categories.new')])><a href="{{ route('admin.categories.new') }}">New Category</a></li>
                </ul>
            </li>
            <li class="submenu-holder">
                <div><i class="fa-solid fa-newspaper"></i><span>Articles</span></div>
                <ul>
                    <li @class(['active'=>request()->routeIs('admin.articles.list')])><a href="{{ route('admin.articles.list', ['category' =>'all']) }}">Articles</a></li>
                    <li @class(['active'=>url()->current() === route('admin.articles.new')])><a href="{{ route('admin.articles.new') }}">New Article</a></li>
                </ul>
            </li>
            <li class="last"><a href="{{ route('admin.logout') }}"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>
        </ul>
    </nav>

    <div id="content">
        @yield('content')
    </div>


    <script src="{{ asset('js/admin/home.js') }}"></script>
    <script src="{{ asset('js/admin/layout.js') }}"></script>
</body>

</html>