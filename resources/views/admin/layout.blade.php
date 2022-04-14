<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('pageTitle')</title>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/menu.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('headers')

</head>

<body>
    <aside>

        <div class="current-user">
            <img src="https://www.pexels.com/photo/11574219/download/">

            <h4>KALIPE Kossi Mathias</h4>
            <button>Se déconnecter</button>
        </div>

        <nav>
            <ul>
                <li class="active">
                    <i class="fa-solid fa-home"></i><a href="">Dashboard</a>
                </li>
                <li>
                    <i class="fa-solid fa-book"></i><a href="">Categories</a>
                </li>
                <li>
                    <i class="fa-solid fa-book-open"></i><a href="">Articles</a>
                </li>
                <li>
                    <i class="fa-solid fa-gear"></i><a href="">Paramètres</a>
                </li>
            </ul>
        </nav>
    </aside>

    <div id="content">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
        integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/admin/home.js') }}"></script>
</body>

</html>
