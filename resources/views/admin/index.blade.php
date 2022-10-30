@extends('layouts.app')

@section('title_name', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <br><br>
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <a href="{{ route('admin.create_news') }}">Добавить новость</a><br><br>
                    <a href="{{ route('admin.create_category') }}">Добавить категорию</a><br><br>
                </div>
            </div>
        </div>
    </div>
@endsection
