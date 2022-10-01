@extends('layouts.app')
@section('title_name', 'Категории')

@section('menu')
    @include('menu.menu')
@endsection

@section('content')
    <br>
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <div class="list-group">
                       @forelse($categories as $item)
                          <a class="list-group-item list-group-item-action" href="{{ route('categories.item', $item['slug']) }}">{{ $item['title'] }}</a><br>
                       @empty
                    </div>
                        <p>Нет категорий</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
