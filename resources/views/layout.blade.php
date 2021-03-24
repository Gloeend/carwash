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
        crossorigin="anonymous"></script>
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
                sHome: "{{route('home')}}",
                sService: "{{route('service')}}",
                sAbout: "{{route('about')}}",
                sOrder: "{{route('order')}}",
                sContacts: "{{route('contacts')}}",
                sRequest: "{{route('request')}}",
                sOrderGetService: "{{route('order-get-service')}}",
                sOrderGetClass: "{{route('order-get-class')}}",
                sOrderGetMMS: "{{route('order-get-mmc')}}",
                sOrderGetModels: "{{route('get-models')}}",
                sLogin: "{{route('login')}}",
                sAdmin: "{{route('admin')}}",
            }
        }
    </script>
    @yield('append-sources')
</head>
<body>
<header class="header">
    <div class="header__top-bar-wrapper">
        <div class="h-100 top-bar__container d-flex flex-row justify-content-between align-items-center container">
            <div>
                <p class="fz-14 montserrat-text m-0">
                    <img src="../media/icon/location.svg" alt="location" class="mr-2">г.Томск, ул. Бела Куна 14, кв. 79
                </p>
            </div>
            <div>
                <a href="tel:+79536664112" class="mr-5 fz-14 montserrat-text">
                    <img src="../media/icon/phone.svg" alt="tel" class="mr-2">+7 953 666 41 12
                </a>
                <a href="mailto:carwash@gmail.com" class="fz-14 montserrat-text">
                    <img src="../media/icon/message.svg" alt="mail" class="mr-2">carwash@gmail.com
                </a>
            </div>
        </div>
    </div>
    <div class="header__navigation-wrapper">
        <div class="h-100 navigation__container container d-flex flex-row justify-content-between align-items-center container">
            <div class="navigation__logotype d-flex flex-row align-items-center">
                <nav class="logotype__social-links mr-3">
                    <a href="#" class="m-0"><img src="../media/icon/social/vk.svg" alt="vk"></a>
                    <a href="#"><img src="../media/icon/social/youtube.svg" alt="youtube"></a>
                    <a href="#"><img src="../media/icon/social/instagram.svg" alt="inst"></a>
                </nav>
                <a href="{{route('home')}}" class="fz-20 fw-medium montserrat-text mb-1">namelogo</a>
            </div>
            <div class="navigation__pages">
                <nav class="pages__links d-flex flex-row justify-content-between">
                    <a href="{{route('about')}}" class="fz-14 fw-semi-bold montserrat-text">О НАС</a>
                    <a href="{{route('service')}}" class="fz-14 fw-semi-bold montserrat-text">УСЛУГИ</a>
                    <a href="#" class="fz-14 fw-semi-bold montserrat-text">ЦЕНЫ</a>
                    <a href="#" class="fz-14 fw-semi-bold montserrat-text">ГАЛЕРЕЯ</a>
                    <a href="{{route('contacts')}}" class="fz-14 fw-semi-bold montserrat-text">КОНТАКТЫ</a>
                    <a href="{{route('order')}}" class="fz-14 fw-semi-bold montserrat-text">ЗАПИСАТЬСЯ</a>
                </nav>
            </div>
        </div>
    </div>
</header>
<main>
    @yield('content')
</main>
<footer class="footer">
    <div class="w-100 container d-flex flex-row justify-content-between mb-5 pb-5">
        <div class="footer__location">
            <div class="d-flex flex-row align-items-center mb-5">
                <div class="logotype"></div>
                <div class="d-flex flex-column ml-3">
                    <p class="mb-1 montserrat-text fz-14">Лучшая автомойка в Томске и Томской области!</p>
                    <p class="mb-0 montserrat-text fz-14 fw-bold">namelogo</p>
                </div>
            </div>
            <p class="mb-4 montserrat-text fz-14"><img src="../media/icon/clock.svg" alt="clock" class="mr-1"> Мы работаем с 9:00 до 22:00</p>
            <p class="montserrat-text fz-14"><img src="../media/icon/location.svg" alt="location"> г.Томск, ул. Бела Куна 14, кв. 79</p>
        </div>
        <div class="footer__navigation d-flex flex-column justify-content-between">
            <a href="#" class="fz-18 montserrat-text">О НАС</a>
            <a href="#" class="fz-18 montserrat-text">УСЛУГИ</a>
            <a href="#" class="fz-18 montserrat-text">ЦЕНЫ</a>
            <a href="#" class="fz-18 montserrat-text">ГАЛЕРЕЯ</a>
            <a href="#" class="fz-18 montserrat-text">КОНТАКТЫ</a>
        </div>
        <div class="footer__contact-information d-flex flex-column">
            <div class="d-flex flex-column mb-5">
                <p class="mb-0 montserrat-text fz-14 text-right">Наши социальные сети:</p>
                <div class="d-flex flex-row align-self-end justify-content-around align-items-center w-75">
                    <a href="#"><img src="../media/icon/social/vk.svg" alt="vk"></a>
                    <a href="#"><img src="../media/icon/social/youtube.svg" alt="youtube"></a>
                    <a href="#"><img src="../media/icon/social/instagram.svg" alt="instagram" class="mr-0"></a>
                </div>
            </div>
            <div>
                <p class="montserrat-text fz-18 mr-0 text-right"><img src="../media/icon/phone.svg" alt="phone" class="mr-3"> +7 953 666 41 12</p>
                <p class="montserrat-text fz-18 text-right"><img src="../media/icon/message.svg" alt="message" class="mr-2"> carwash@gmail.com</p>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-row justify-content-between pt-5 mb-5 pb-5">
        <p>Копирование данных и бла-бла-бла запрещено, копировантие данных влечет за собой какую-нибудь ответственность.</p>
        <p>Разработка сайта <b>«Tea»</b></p>
    </div>
    <p class="text-center">© 2014 - 2020 ООО "namelogo".</p>
</footer>
</body>
</html>
