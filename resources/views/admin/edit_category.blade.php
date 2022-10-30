@extends('layouts.app')

@section('title_name', 'Редактирование категории')

@section('menu')
@include('admin.menu')
@endsection

@section('content')

<div class="container px-4">
    <div class="row gx-5">
        <div class="col">
            <form action=" {{ route('admin.editcategory', ['id' => $id]) }}" method="post">
                @csrf
                <fieldset>
                    <legend>Форма добавления категории</legend>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Название:</label>
                            <input class="form-control" name="title" type="text" placeholder="<название категории>" aria-label="default input example" value="{{ $category->title }}">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Текст:</label>
                            <textarea class="form-control" name="text" aria-label="With textarea" >{{ $category->text }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Слаг:</label>
                            <input class="form-control" name="slug" type="text" placeholder="<слаг>" aria-label="default input example" value="{{ $category->slug }}">

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

