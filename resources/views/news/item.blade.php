@extends('layouts.app')
@section('title_name', 'Новость')

@section('menu')
    @include('menu.menu')
@endsection

@section('content')
    <br><br>

    @if($item)
        <div><b>{{ $item['title'] }}</b></div><br>

        @if($item['isPrivate'])
            <a href="{{ route('login') }}">Зарегистрируйтесь</a> чтобы посмотреть
        @else
            Текст:<br>
            <div>{{ $item['text'] }}</div><br>
        @endif
    @else
        Нет такой новости
    @endif
@endsection
