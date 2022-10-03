@extends('layouts.app')
@section('title_name', 'Новость')

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <br><br>

    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <div class="card">
                        @if($item)
                        <h5 class="card-header"><b><a href="{{ route('categories.item', $slug) }}">[<<]</a> {{ $item['title'] }}</b></h5>
                        <div class="card-body">
                            @if($item['isPrivate'])
                                <a href="{{ route('login') }}">Зарегистрируйтесь</a> чтобы посмотреть
                            @else
                                <p class="card-text">{{ $item['text'] }}</p>
                            @endif
                        </div>
                        @else
                            Нет такой новости
                        @endif
                        <a href="{{ route('categories.all') }}" class="btn btn-primary">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
