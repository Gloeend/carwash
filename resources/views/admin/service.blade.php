@extends('admin.layout')
@section('title') Услуги @endsection
@section('content')
@section('append-sources')
<script type="text/javascript" src="../js/service.js"></script> @endsection
<div id="service-form" class="modal fade">
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
                        <label for="price">Цена</label>
                        <input type="number" id="price" name="price" class="form-control">
                    </div>
                    <div class="form-group w-75">
                        <label for="type">Тип услуги</label>
                        <select name="type" id="type" class="form-control">
                        @foreach ($obTypeServices as $obTypeService)
                            <option value="{{$obTypeService->title}}">{{$obTypeService->title}}</option>
                        @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="service-form-id">
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-danger w-25 d-none" id="service-add-form-submit">Добавить</button>
                    <button type="submit" class="btn btn-primary d-none" id="service-update-form-submit">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="container pb-5 pt-5">
        <div class="d-flex flex-row align-items-center">
            <h4>Услуги</h4>
            <button class="ml-5 btn" id="open-add-form">Добавить</button>
        </div>
        <div id="services-table-data">

        </div>
</section>
@endsection
