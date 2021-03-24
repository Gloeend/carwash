@extends('admin.layout')
@section('title') Автомобили @endsection
@section('content')
@section('append-sources')
<script type="text/javascript" src="../js/mmc.js"></script> @endsection
<div id="mmc-form" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Заголовок модального окна -->
            <div class="modal-header d-flex flex-row align-items-center justify-content-center">
                <p class="modal-title"></p>
            </div>
            <!-- Основное содержимое модального окна -->
            <div class="modal-body">
                <form class="align-items-center d-flex flex-column" action="#">
                    <div class="w-75 d-none alert alert-danger" role="alert" id="form-error">
                        <strong></strong>
                    </div>
                    <div class="form-group w-75">
                        <label for="title">Название</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="form-group w-75">
                        <label for="mark">Марка автомобиля</label>
                        <select name="mark" id="mark" class="form-control">
                        @foreach ($obMarks as $obMark)
                            <option value="{{$obMark->title}}">{{$obMark->title}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group w-75">
                        <label for="class">Класс автомобиля</label>
                        <select name="class" id="class" class="form-control">
                        @foreach ($obClasses as $obClass)
                            <option value="{{$obClass->title}}">{{$obClass->title}}</option>
                        @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="mmc-form-id">
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-danger w-25 d-none" id="mmc-add-form-submit">Добавить</button>
                    <button type="submit" class="btn btn-primary d-none" id="mmc-update-form-submit">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="container pb-5 pt-5">
        <div class="d-flex flex-row align-items-center">
            <h4>Автомобили</h4>
            <button class="ml-5 btn" id="open-add-form">Добавить</button>
        </div>
        <div id="mmcs-table-data">

        </div>
</section>
@endsection
