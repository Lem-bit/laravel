@extends('layouts.main')
@section('title_name', 'Категория')

@section('menu')
    @include('menu.menu')
@endsection

@section('content')
    <br><br>
    @forelse($news as $item)
        <a href="{{ route('categories.show', [$slug, $item['id']]) }}">{{ $item['title'] }}</a><br>
    @empty
        <p>Нет такой категории</p>
    @endforelse
@endsection



