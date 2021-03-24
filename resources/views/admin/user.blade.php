@extends('admin.layout')
@section('title') Пользователи @endsection
@section('content')
@section('append-sources')
<script type="text/javascript" src="../js/user.js"></script> @endsection
<div id="user-form" class="modal fade">
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
                        <label for="email">Почта</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group w-75">
                        <label for="name">ФИО</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group w-75">
                        <label for="password">Пароль</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <input type="hidden" name="user-form-id">
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-danger w-25 d-none" id="user-add-form-submit">Добавить</button>
                    <button type="button" class="btn btn-primary d-none" id="user-update-form-submit">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="container pb-5 pt-5">
    <div class="d-flex flex-row align-items-center">
        <h4>Пользователи</h4>
        <button class="ml-5 btn" id="open-add-form">Добавить</button>
    </div>
    <div id="users-table-data">

    </div>
</section>
@endsection
