<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;800&display=swap" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"
    ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"
    >
    </script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="../favicon.ico">
    <script type="text/javascript">
        let objConfig = {
            sCsrf: $('meta[name="csrf-token"]').attr('content'),
            objRoutes: {
                sAdmin: " {{route('admin')}} ",

                sAddUser: " {{route('users-create')}} ",
                sUpdUser: " {{route('users-update')}} ",
                sDelUser: " {{route('users-delete')}} ",
                sFetchUser: " {{route('users-fetch')}} ",

                sAddService: " {{route('services-create')}} ",
                sUpdService: " {{route('services-update')}} ",
                sDelService: " {{route('services-delete')}} ",
                sFetchService: " {{route('services-fetch')}} ",

                sAddType: " {{route('types-create')}} ",
                sUpdType: " {{route('types-update')}} ",
                sDelType: " {{route('types-delete')}} ",
                sFetchType: " {{route('types-fetch')}} ",

                sAddMmc: " {{route('mmc-create')}} ",
                sUpdMmc: " {{route('mmc-update')}} ",
                sDelMmc: " {{route('mmc-delete')}} ",
                sFetchMmc: " {{route('mmc-fetch')}} ",

                sAddMark: " {{route('marks-create')}} ",
                sUpdMark: " {{route('marks-update')}} ",
                sDelMark: " {{route('marks-delete')}} ",
                sFetchMark: " {{route('marks-fetch')}} ",

                sUpdClass: " {{route('classes-update')}} ",
                sFetchClass: " {{route('classes-fetch')}} ",

                sUpdOrder: " {{route('orders-update')}} ",
                sDelOrder: " {{route('orders-delete')}} ",
                sFetchOrder: " {{route('orders-fetch')}} ",

            }
        }
    </script>
    @yield('append-sources')
</head>
<body>
<header class="header">

    <div class="header__navigation-wrapper">
        <div class="h-100 navigation__container container d-flex flex-row justify-content-between align-items-center container">
            <div class="navigation__logotype d-flex flex-row align-items-center">
            <a href="{{route('home')}}" class="fz-20 fw-medium montserrat-text mb-1">Namelogo Администратор</a>
            </div>
            <div class="navigation__pages">
                <nav class="pages__links d-flex flex-row justify-content-between">
                    <a href="{{route('orders-admin')}}" class="fz-14 fw-semi-bold montserrat-text">Записи</a>
                    <a href="{{route('users-admin')}}" class="fz-14 fw-semi-bold montserrat-text">Пользователи</a>
                    <a href="{{route('mmc-admin')}}" class="fz-14 fw-semi-bold montserrat-text">Автомобили</a>
                    <a href="{{route('marks-admin')}}" class="fz-14 fw-semi-bold montserrat-text">Марки</a>
                    <a href="{{route('classes-admin')}}" class="fz-14 fw-semi-bold montserrat-text">Классы</a>
                    <a href="{{route('services-admin')}}" class="fz-14 fw-semi-bold montserrat-text">Услуги</a>
                    <a href="{{route('types-admin')}}" class="fz-14 fw-semi-bold montserrat-text">Типы услуг</a>
                    <a href="{{route('logout')}}" class="fz-14 fw-semi-bold montserrat-text">Выход</a>
                </nav>
            </div>
        </div>
    </div>
</header>
<main class="pt-5 pb-5">
    @yield('content')
</main>
</body>
</html>
