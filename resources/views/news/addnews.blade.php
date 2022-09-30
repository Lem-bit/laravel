@extends('layouts.main')

@section('title_name', 'Добавить новость')

@section('menu')
    @include('menu.menu')
@endsection

@section('content')

    <html>
    <head>

    </head>
    <body>
    <br>
    Категория:<input type><br><br>
    Название:<input type><br><br>
    Текст:<input type="text"><br><br>
    <input type="button" onclick="" value="Добавить" />
    <input type="button" onclick="location.href='{{ route('categories.all') }}'" value="Отмена" />
    </body>
    </html>

@endsection

