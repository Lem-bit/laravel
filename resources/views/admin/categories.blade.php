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
                    <hr>
                    @forelse($categories as $item)
                        <div class="card-body">
                            <u><b><p class="card-text">{{ $item->id }}</p></b></u>
                            <b><p class="card-text">TITLE: {{ $item->title }}</p></b>
                            <b><p class="card-text">TEXT: {{ $item->text }}</p></b>
                            <i><p class="card-text">SLUG: {{ $item->slug }}</p></i>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm" onclick="location.href='{{ route('admin.editcategory', [$item->id]) }}'">Редактировать</button>
                            <button type="submit" class="btn btn-primary btn-sm" onclick="location.href='{{ route('admin.deletecategory', [$item->id]) }}'">Удалить</button>
                            <hr>
                        </div>

                    @empty

                    @endforelse
                </div>


            </div>
        </div>
    </div>
@endsection
