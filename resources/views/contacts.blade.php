@extends('layout')
@section('title') Контакты @endsection
@section('content')

    <main class="contacts mb-5 pb-5">
        <section class="contacts__header container mt-5 pt-5">
            <h2 class="text-center">Контакты</h2>
            <div class="montserrat-text d-flex flex-row justify-content-between mt-5 pt-5 ">
                <p class="montserrat-text fz-24 mr-0">
                    <img src="media/icon/phone_black.svg" alt="phone" class="mr-3"> +7 953 666 41 12
                </p>
                <p class="montserrat-text fz-24 mr-0">
                    <img src="media/icon/phone_black.svg" alt="phone" class="mr-3"> 69 - 50 - 57
                </p>
                <p class=" fz-24">
                    <img src="media/icon/message_black.svg" alt="message" class="mr-3"> carwash@gmail.com
                </p>
            </div>
        </section>
        <section class="contacts__addresses container montserrat-text mt-5 pt-5">
            <div class="addresses__addr d-flex">
                <script type="text/javascript" charset="utf-8" async
                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?apikey=6c0f41ea-575b-4255-bc4c-cd18df663904
&um=constructor%3A52cf07062f0128c4b1eaadd1208bfcf7d93611f2d6c57403a8ca804b8075b7c1&amp;width=475&amp;height=396&amp;lang=ru_RU&amp;scroll=true"
                ></script>
                <div class="align-self-start ml-5 pl-5 mt-5">
                    <p class="fw-medium fz-18">Мы находимся по адресу:</p>
                    <p class="fz-20 mr-0">
                        <img src="media/icon/location_red.svg" alt="location red" class="mr-3"> ул. Нахимова, дом 104
                    </p>
                    <img src="media/icon/addresses_addr_line.svg" alt="addresses_addr_line" class="mb-4 mt-2">
                    <p class="fz-14">Автосалон работает ежедневно:</p>
                    <p class="fz-18 mr-0 mb-5">
                        <img src="media/icon/location_red.svg" alt="location red" class="mr-3"> ул. Нахимова, дом 104
                    </p>
                    <button class="text-uppercase button button-red w-50 fz-12 fw-semi-bold">Записаться</button>
                </div>
            </div>
            <div class="addresses__addr d-flex">
                <script type="text/javascript" charset="utf-8" async
                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?apikey=6c0f41ea-575b-4255-bc4c-cd18df663904
&um=constructor%3A52cf07062f0128c4b1eaadd1208bfcf7d93611f2d6c57403a8ca804b8075b7c1&amp;width=475&amp;height=396&amp;lang=ru_RU&amp;scroll=true"
                ></script>
                <div class="align-self-start ml-5 pl-5 mt-5">
                    <p class="fw-medium fz-18">Мы находимся по адресу:</p>
                    <p class="fz-20 mr-0">
                        <img src="media/icon/location_red.svg" alt="location red" class="mr-3"> ул. Нахимова, дом 104
                    </p>
                    <img src="media/icon/addresses_addr_line.svg" alt="addresses_addr_line" class="mb-4 mt-2">
                    <p class="fz-14">Автосалон работает ежедневно:</p>
                    <p class="fz-18 mr-0 mb-5">
                        <img src="media/icon/location_red.svg" alt="location red" class="mr-3"> ул. Нахимова, дом 104
                    </p>
                    <button class="text-uppercase button button-red w-50 fz-12 fw-semi-bold">Записаться</button>
                </div>
            </div>
            <div class="addresses__addr d-flex">
                <script type="text/javascript" charset="utf-8" async
                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?apikey=6c0f41ea-575b-4255-bc4c-cd18df663904
&um=constructor%3A52cf07062f0128c4b1eaadd1208bfcf7d93611f2d6c57403a8ca804b8075b7c1&amp;width=475&amp;height=396&amp;lang=ru_RU&amp;scroll=true"
                ></script>
                <div class="align-self-start ml-5 pl-5 mt-5 mb">
                    <p class="fw-medium fz-18">Мы находимся по адресу:</p>
                    <p class="fz-20 mr-0">
                        <img src="media/icon/location_red.svg" alt="location red" class="mr-3"> ул. Дальне - Ключевская, дом 23
                    </p>
                    <img src="media/icon/addresses_addr_line.svg" alt="addresses_addr_line" class="mb-4 mt-2">
                    <p class="fz-14">Автосалон работает ежедневно:</p>
                    <p class="fz-18 mr-0 mb-5">
                        <img src="media/icon/location_red.svg" alt="location red" class="mr-3"> ул. Бела Куна 14, кв. 79
                    </p>
                    <button class="text-uppercase button button-red w-50 fz-12 fw-semi-bold">Записаться</button>
                </div>
            </div>
        </section>

@endsection
