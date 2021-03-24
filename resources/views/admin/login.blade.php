@extends('layout')
@section('title') Вход @endsection
@section('content')
@section('append-sources')
<script type="text/javascript" src="../js/login.js"></script>
@endsection
<section class="d-flex flex-column align-items-center container pt-5 mt-5 pb-5 mb-5 w-50">
    <h1>Вход</h1>
    <form class="w-50 align-items-center d-flex flex-column" action="#">
        <div class="d-none alert alert-danger" role="alert" id="login-error">
            <strong></strong>
        </div>
        <div class="form-group w-75">
            <label for="email">Почта</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group w-75">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Запомнить</label>
        </div>
        <button type="button" class="btn btn-danger w-25 mt-5" id="login-form-submit">Войти</button>
    </form>
</section>
@endsection


