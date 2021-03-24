@extends('layout')
@section('title') Запись @endsection
@section('append-sources')
    <script type="text/javascript" src="js/order.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
@endsection
@section('content')
    <section class="container montserrat-text pt-5 mt-5">
        <p class="fw-medium fz-18">Выберите марку и модель Вашего автомобиля из списка, чтобы рассчитать предварительную
            стоимость услуг.</p>
        <div class="mark-model__form w-75 mt-5 pt-5">
            <div v class="d-flex flex-row" id="mark-model">
                <div class="mr-5">
                    <label class="d-flex flex-row align-items-center"> <span class="mr-3">Марка</span>
                        <select name="mark" id="mark" class="form-control">
                            <option value="nothing"></option>
                            @foreach($obMarks as $obMark)
                                <option value="{{$obMark->id}}">{{$obMark->title}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div>
                    <label class="d-flex flex-row align-items-center"> <span class="mr-3">Модель</span>
                        <select name="model" id="model" class="form-control">
                            <option value="nothing"></option>
                        </select>
                    </label>
                </div>
                <div id="model-class-price">

                </div>
            </div>
        </div>
    </section>
    <section class="container montserrat-text mt-5 pt-5" id="order_service">
        <div class="choice-of-type fz-24 d-flex flex-row mt-5 pt-5">
            @foreach($arServices as $ind => $obServices)
            @if (isset($obServices[0]))
                <button class="{{$ind !== 0 ? 'ml-5 pl-5 pr-5' : 'choice-of-type-selected'}} choose-btn mr-5 " data-index="{{$ind}}">
                    {{$obServices[0]->typeService()->first()->title}}</button>
            @endif
            @endforeach
        </div>
        <div class="list-services pt-5 mt-5 mb-5 pb-5">
            @foreach($arServices as $ind => $obServices)
                @foreach($obServices as $obService)
                    <div data-index="{{$ind}}"
                         class="{{$ind !== 0 ? 'd-none' : 'd-flex'}} list-services__service-item flex-row justify-content-between align-items-center mb-3"
                    >
                        <div class="service-item__text d-flex flex-row justify-content-between align-items-center pl-3 pr-3">
                            <p class="mb-0 fz-20">{{$obService->title}}</p>
                            <p class="mb-0 fz-20"><span>{{$obService->price}}</span> ₽</p>
                        </div>
                        <button class="service-item-add-btn" data-index="0">
                            <img src="media/icon/service-add.svg" alt="service item add" class="d-none">
                        </button>
                    </div>
                @endforeach
            @endforeach
            <div class="list-services__end d-flex flex-row justify-content-between fz-20 mt-4 pt-4">
                <p>Всего отмеченных услуг: <span class="fz-22 ml-2"></span></p>
                <p>Стоимость: <span class="fz-22 ml-2"></span></p>
            </div>
        </div>
        <div class="d-flex flex-column w-100 align-items-center mt-5 mb-5 pb-5">
            <form class="d-flex flex-column service-form align-items-center">
                <p class="fz-20 pt-5">Заполните форму для обратной связи: </p>
                <div class="alert alert-danger d-none" role="alert">
                    <p class="mb-0"></p>
                </div>
                <div class="alert alert-success d-none" role="alert">
                    <p class="mb-0"></p>
                </div>
                <label class="d-flex flex-row mt-5"> <img src="media/icon/service-form-fio.svg" alt="service form fio"
                                                          class="ml-3">
                    <input type="text" class="fz-20" placeholder="Ваше ФИО" name="fio">
                </label>
                <label class="d-flex flex-row mt-3"> <img src="media/icon/service-form-phone.svg"
                                                          alt="service form phone" class="ml-3">
                    <input type="text" class="fz-20" placeholder="Номер телефона" name="phone">
                </label>
                <button type="button" class="button button-red mt-5 mb-5">Записаться</button>
            </form>
        </div>

    </section>

@endsection
