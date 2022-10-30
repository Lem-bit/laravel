@extends('layouts.app')

@section('title_name', 'Список новостей')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <br><br>
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="location.href='{{ route('admin.saveallnews') }}'">Скачать все новости</button>
                    <hr>
                    @forelse($news as $item)
                        <div class="card-body">
                            <u><p class="card-text">id: {{ $item->id }} / {{ $item->id_category }}</p></b></u>
                            <b><p class="card-text">{{ $item->title }}</p></b>
                            <p class="card-text">{{ $item->text }}</p>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" onclick="location.href='{{ route('admin.editnews', [$item->id]) }}'">Редактировать</button>
                            <button class="btn btn-primary btn-sm" onclick="location.href='{{ route('admin.deletenews', [$item->id]) }}'">Удалить</button>
                            <hr>
                        </div>

                    @empty

                    @endforelse
                </div>


            </div>
        </div>
    </div>
@endsection
