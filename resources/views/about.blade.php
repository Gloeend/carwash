@extends('layout')
@section('title') О нас @endsection
@section('content')
@section('append-sources')<script type="text/javascript" src="js/about.js"></script>@endsection

    <div class="video-container">
        <video id="header-about-video" data-index="1" src="media/video/header-about-video.mp4" class="w-100 d-block about-video-header" muted autoplay loop></video>
        <button class="btn-play hide"><img src="media/icon/play.svg" alt="play icon"></button>
        <button class="btn-pause"><img src="media/icon/pause.svg" alt="pause icon"></button>
    </div>

    <section class="montserrat-text about__wrapper pt-5">
        <div class="container d-flex flex-column mt-5">
            <div class="d-flex flex-row w-100 justify-content-between align-items-center mb-5">
                <p class="fz-24">NAMELOGO</p>
                <p class="fz-18">ЛУЧШАЯ АВТОМОЙКА В ТОМСКЕ</p>
            </div>
            <div class="about__text d-flex flex-row justify-content-around align-items-center mt-5 mb-5">
                <div></div>
                <p class="fz-18">
                    Лучшее качество в городе, хорошие цены
                    и множество различных услуг, которые
                    можно <br> осуществить в нашем салоне!
                    Помимо этого, вы можете приобрести
                    у нас множество <br> товаров для вашего
                    автомобиля.
                </p>
            </div>
            <p class="align-self-center text__about-large mt-5 mb-5 pb-5">Я как будто бы уже давно глубокий старец,
                бессмертный, ну или там уже почти бессмертный,
                который на этой планете от её самого зарождения, ещё когда только Солнце
                только-только сформировалось как звезда, и вот это газопылевое облако,
                вот, после взрыва, Солнца, когда оно вспыхнуло, как звезда, начало
                формировать вот эти коацерваты, планеты, понимаешь, я на этой Земле уже
                как будто почти пять миллиардов лет живу и знаю её вдоль и поперёк
                этот весь мир, а ты мне какие-то... мне не важно на твои тачки, на твои
                яхты, на твои квартиры, там, на твоё благо. </p>
        </div>
    </section>
    <div class="video-container">
        <video id="footer-about-video" data-index="0" src="media/video/footer-about-video.mp4" class="w-100 d-block about-video-header" muted loop></video>
        <button class="btn-play hide"><img src="media/icon/play.svg" alt="play icon"></button>
        <button class="btn-pause"><img src="media/icon/pause.svg" alt="pause icon"></button>
    </div>
@endsection
