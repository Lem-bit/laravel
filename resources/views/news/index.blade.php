@extends('layouts.app')
@section('title_name', 'Категория')

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <br><br>
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <h5 class="card-header"><b><a href="{{ route('categories.all') }}">Все категории</a> \ {{ $title }} <br><br></b></h5>
                    <div class="list-group">
                        @forelse($news as $item)
                            <a class="list-group-item list-group-item-action" href="{{ route('categories.show', [$slug, $item->id]) }}">{{ $item->title }}</a><br>
                        @empty
                            <p>Нет такой категории</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



