@extends('admin.layout')
@section('title') Записи @endsection
@section('content')
@section('append-sources')
<script type="text/javascript" src="../js/admin_order.js"></script> @endsection

<div id="order-form" class="modal fade">
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
                    <div class="form-group w-75" id="datetime-form-group-label"
                        <label for="datetime">Время</label>
                        <input type="datetime-local" id="datetime" name="datetime" class="form-control">
                    </div>
                    <div class="form-group w-75" id="status-form-group-label">
                        <label for="datetime">Статус</label>
                        <select name="status" id="status-input" class="form-control">
                            <option value="В ожидании">В ожидании</option>
                            <option value="Подтвержден">Подтвержден</option>
                            <option value="Отклонен">Отклонен</option>
                            <option value="Выполнен">Выполнен</option>
                        </select>
                    </div>
                    <input type="hidden" name="order-form-id">
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary d-none" id="order-update-form-submit">Сохранить изменения</button>
                    <button type="submit" class="btn btn-primary d-none" id="sort-form-submit">Сортировать</button>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="container pb-5 pt-5">
        <div class="d-flex flex-row align-items-center">
            <h4>Записи</h4>
            <div class="d-flex flex-row ml-3">
                <button class="sort-button btn ml-2" data-sort="date">Сортировать по дате</button>
                <button class="sort-button btn ml-2" data-sort="status">Сортировать по статусу</button>
                <button class="sort-button btn ml-2" data-sort="with-time">Есть время</button>
                <button class="sort-button btn ml-2" data-sort="without-time">Нету времени</button>
                <button class="sort-button btn ml-2 btn-success" data-sort="default">Сбросить</button>
            </div>
        </div>
        <div id="orders-table-data">

        </div>
</section>
@endsection
