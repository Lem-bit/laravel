@extends('layouts.app')
@section('title_name', 'Категории')

@section('menu')
    @include('menu.menu')
@endsection

@section('content')
    <br>
    <br>
    <a href="{{ route('categories.add') }}">Добавить новость</a><br><br>

    @forelse($categories as $item)
        <a href="{{ route('categories.item', $item['slug']) }}">{{ $item['title'] }}</a><br>
    @empty
        <p>Нет категорий</p>
    @endforelse
@endsection
