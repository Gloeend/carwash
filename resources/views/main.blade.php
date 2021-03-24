@extends('layout')

@section('title') Главная @endsection
@section('content')
    <section class="introduction w-100">
        <div class="container d-flex flex-row">
            <div class="text-white">
                <p class="fz-18 inter-text mb-3"><b class="fz-48">1230+</b> <br> довольных клиентов</p>
                <p class="fz-18 inter-text mb-3"><b class="fz-48">10</b> <br> лет работы</p>
                <p class="fz-18 inter-text"><b class="fz-48">1230+</b> <br> филиала</p>
            </div>
            <div class="d-flex flex-column align-items-end">
                <p class="text-right montserrat-text fw-regular fz-36 text-white w-50">Запишись на самую лучшую мойку в
                    Томске и Томской области</p>
                <button class="button button-red right fw-regular mt-5">Подробнее</button>
            </div>
        </div>
    </section>
    <section class="preinfo w-100">
        <div class="container text-white d-flex flex-row justify-content-around align-items-center h-100">
            <div class="text-center">
                <img src="media/icon/introduction-icon-first.svg" alt="intro icon first">
                <p class="montserrat-text fz-14 mt-4">Современное оборудование</p>
            </div>
            <div class="text-center">
                <img src="media/icon/introduction-icon-second.svg" alt="intro icon second">
                <p class="montserrat-text fz-14 mt-4">Профессиональные средства</p>
            </div>
            <div class="text-center">
                <img src="media/icon/introduction-icon-third.svg" alt="intro icon third">
                <p class="montserrat-text fz-14 mt-4">Квалифицированный персонал</p>
            </div>
        </div>
    </section>
    <section class="about w-100 mt-5 pt-5 pb-5">
        <div class="about__text container montserrat-text d-flex flex-column align-items-center mt-5 mb-5 fz-24">
            <h5 class="fz-36 mb-4 pb-4 align-self-start">О НАС</h5>
            <p>
                Мы работаем с 2008 года. За более чем 10 лет работы, стараниями высококвалифицированного персонала,
                мы по праву зарекомендовали себя, как одна из лучших автомоек в нашем городе. Мы гордимся своей
                репутацией
                и гарантируем качество нашей работы. Звоните и приезжайте в любое время, мы работаем без перерывов и
                выходных.
                <br><br>
                В список наших услуг входит мойка автомобиля, шиномонтаж, ремонт шин и дисков, химчистка салона,
                полировка
                кузова, покрытие кузова нанокерамическим составом, комплексная предпродажная подготовка, тонировка
                стекол,
                оклейка авто антигравийной пленкой, винилография, устранение неприятных запахов из салона и
                кондиционера,
                удаление царапин и многое другое.
            </p>
            <button class="button button-red right fw-regular mt-5">Подробнее</button>
        </div>
    </section>
    <section class="services w-100 d-flex flex-column  text-white montserrat-text fz-36">
        <div class="d-flex flex-row justify-content-between">
            <div class="services__image-text fit-content" id="first"></div>
            <div class="services__image-text fit-content" id="second">
                <div class="image-text__wrapper">
                    <p class="ml-3">Мойка двигателя</p>
                </div>
            </div>
            <div class="services__image-text fit-content" id="third"></div>
            <div class="text-right services__image-text fit-content d-flex flex-column" id="fourth">
                <div class="image-text__wrapper align-self-end">
                    <p class="mr-3">Наномойка</p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between mt-3">
            <div class="services__image-text fit-content" id="fifth">
                <div class="image-text__wrapper">
                    <p class="ml-3">Пылесос</p>
                </div>
            </div>
            <div class="services__image-text fit-content" id="sixth"></div>
            <div class="services__image-text fit-content" id="seventh">
                <div class="image-text__wrapper">
                    <p class="ml-3">Химчистка салона</p>
                </div>
            </div>
            <div class="text-center services__image-text fit-content d-flex flex-column" id="eighth">
                <div class="image-text__wrapper align-self-end">
                    <p>Мойка дисков</p>
                </div>
            </div>
        </div>
    </section>
    <section class="location montserrat-text d-flex flex-row">
        <div class="location__map">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A28c85e6880a81d329bd41f49b17a710c1b24910ee4fc22f4a3f55eb0e3428b19&amp;source=constructor"
                    width="856" height="922" frameborder="0"
            ></iframe>
        </div>
        <div class="location__contacts ml-5 pl-5 mt-5">
            <h5 class="text-uppercase fz-36 fw-semi-bold mb-5 mt-5">Контакты</h5>
            <p class="fz-20 fw-medium">Связаться с нами можно любым удобным способом.</p>
            <p class="fz-20 fw-medium">Пишите нам на почту, либо же позвоните.</p>
            <div class="ml-5 mt-5 mb-5">
                <p class="montserrat-text fz-36 mr-0 fw-bold">
                    <img src="media/icon/phone_black.svg" alt="phone" class="mr-2"> +7 953 666 41 12
                </p>
                <p class="montserrat-text fz-36 fw-bold">
                    <img src="media/icon/message_black.svg" alt="message" class="mr-2"> carwash@gmail.com
                </p>
            </div>
            <div class="mt-5 pt-5">
                <p class="fz-33 montserrat-text fw-medium mb-5">Мы находимся по адресам:</p>
                <p class="montserrat-text fz-24 ml-4">
                    <img src="media/icon/location_black.svg" alt="message" class="mr-2 mb-3"> ул. Нахимова, дом 104
                </p>
                <p class="montserrat-text fz-24 ml-4">
                    <img src="media/icon/location_black.svg" alt="message" class="mr-2"> ул. Дальне - Ключевская, дом 23
                </p>
            </div>
        </div>
    </section>
@endsection
