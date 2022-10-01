@extends('layouts.app')

@section('title_name', 'Админка')

@section('menu')
    @include('menu.menu')
@endsection

@section('content')
    <br><br>
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <a href="{{ route('admin.addnews') }}">Добавить новость</a><br><br>
                </div>
            </div>
        </div>
    </div>
@endsection
