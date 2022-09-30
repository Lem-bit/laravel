@extends('layouts.main')

@section('title_name', 'Авторизация')

@section('menu')
    @include('menu.menu')
@endsection

@section('content')
    <html>
    <head>

    </head>
    <body>
    <h3>Авторизация</h3>
    <br>
    <br>
    Логин:<input type><br><br>
    Пароль:<input type="password"><br><br>
    <input type="button" onclick="location.href='<?=route('admin.index')?>'" value="Вход" />
    <input type="button" onclick="location.href='<?=route('main')?>'" value="Отмена" />
    </body>
    </html>
@endsection



