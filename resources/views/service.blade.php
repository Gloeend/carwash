@extends('layout')
@section('title') Услуги @endsection
@section('content')

    <section class="montserrat-text service container">
        <div class="service__text mt-5 pt-5 mb-5 pb-5">
            <h5 class="fw-regular fz-33 mb-5">Услуги нашей <b>автомойки:</b></h5>
            <p class="fz-24">Наша автомойка предоставляет широкий спектр услуг, для разных автомобилей.
                И еще что-то наверное, предоставляет. Я кстати гуглила как пишется слово, предоставляет,
                вроде правильно, но у меня ощущение, что нет.
            </p>
        </div>
        <div class="service__service-card d-flex flex-column">
            <div class="d-flex flex-row justify-content-between mb-5 pb-5">
                <div class="service-card__item">
                    <img src="media/img/services/first.png" alt="first service">
                    <div class="ml-3 montserrat-text fw-medium fz-18 mt-3">
                        <a href="#">Трехфазная мойка</a>
                    </div>
                </div>
                <div class="service-card__item">
                    <img src="media/img/services/second.png" alt="second service">
                    <div class="ml-3 montserrat-text fw-medium fz-18 mt-3">
                        <a href="#">Полировка кузова</a>
                    </div>
                </div>
                <div class="service-card__item">
                    <img src="media/img/services/third.png" alt="third service">
                    <div class="ml-3 montserrat-text fw-medium fz-18 mt-3">
                        <a href="#">Комплексная мойка</a>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between mb-5 pb-5">
                <div class="service-card__item">
                    <img src="media/img/services/fourth.png" alt="fourth service">
                    <div class="ml-3 montserrat-text fw-medium fz-18 mt-3">
                        <a href="#">Химчистка салона</a>
                    </div>
                </div>
                <div class="service-card__item">
                    <img src="media/img/services/fifth.png" alt="fifth service">
                    <div class="ml-3 montserrat-text fw-medium fz-14 mt-3">
                        <a href="#">Абразивная полировка ЛКП автомобиля</a>
                    </div>
                </div>
                <div class="service-card__item">
                    <img src="media/img/services/sixth.png" alt="sixth service">
                    <div class="ml-3 montserrat-text fw-medium fz-14 mt-3">
                        <a href="#">Защитная полировка ЛКП автомобиля</a>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div class="service-card__item">
                    <img src="media/img/services/seventh.png" alt="seventh service">
                    <div class="ml-3 montserrat-text fw-medium fz-18 mt-3">
                        <a href="#">Трехфазная мойка</a>
                    </div>
                </div>
                <div class="service-card__item">
                    <img src="media/img/services/eighth.png" alt="eighth service">
                    <div class="ml-3 montserrat-text fw-medium fz-14 mt-3">
                        <a href="#">Полировка кузова</a>
                    </div>
                </div>
                <div class="service-card__item">
                    <img src="media/img/services/ninth.png" alt="ninth service">
                    <div class="ml-3 montserrat-text fw-medium fz-14 mt-3">
                        <a href="#">Комплексная мойка</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
