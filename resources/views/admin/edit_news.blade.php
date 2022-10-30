@extends('layouts.app')

@section('title_name', 'Редактирование новости')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <form action="{{ route('admin.editnews', ['id' => $id]) }}" method="post">
                    @csrf
                    <fieldset>
                        <legend>Форма редактирования новости</legend>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Категория:</label>
                            <div class="form-group">
                                <select name="id_category" class="form-control" aria-label="Категория">
                                    @forelse($categories as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $news->id_category) selected @endif>{{ $item->title }}</option>
                                    @empty
                                        <option value="0" selected>Нет категории</option>
                                    @endforelse

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Название:</label>
                                <input class="form-control" name="title" type="text" placeholder="Default input" aria-label="default input example" value="{{ $news->title }}">

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Текст:</label>
                                <textarea class="form-control" name="text" aria-label="With textarea" >{{ $news->text }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-switch">
                                <input @if($news->is_private === 1) checked @endif class="form-check-input" value="1" name="is_private" type="checkbox" id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Приватная новость</label>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">Сохранить</button>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="location.href='{{ route('admin.index') }}'">Отмена</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@endsection

