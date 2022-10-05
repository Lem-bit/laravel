@extends('layouts.app')

@section('title_name', 'Сохранить новости')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <br><br>
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <form action="{{ route('admin.save_news') }}" method="post">
                        @csrf
                            <legend>Форма сохранения новостей</legend>
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Категория:</label>
                                <div class="form-group">
                                    <select name="id_category" class="form-control" aria-label="Категория">
                                        @forelse($categories as $item)
                                            <option value="{{ $item->id }}" @if($item->id == old('id_category')) selected @endif>{{ $item->title }}</option>
                                        @empty
                                            <option value="0" selected>Нет категории</option>
                                        @endforelse

                                    </select>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type_export" id="flexRadioDefault1" value="1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            JSON format
                                        </label>
                                    </div>
                                    <!--
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type_export" id="flexRadioDefault2" value="2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            PDF format
                                        </label>
                                    </div>
                                    -->
                            </div>

                         <button type="submit" class="btn btn-primary btn-sm">Скачать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
