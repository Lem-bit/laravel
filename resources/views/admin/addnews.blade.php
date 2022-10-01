@extends('layouts.app')

@section('title_name', 'Добавить новость')

@section('menu')
    @include('admin.menu')
@endsection
@section('content')

    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <form action="{{ route('admin.addnews') }}" method="post">
                    @csrf
                    <fieldset>
                        <legend>Форма добавления новости</legend>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Категория:</label>
                            <div class="form-group">
                                <select name="NewsCategoryId" class="form-control" aria-label="Категория">
                                    @forelse($categories as $item)
                                        <option value="{{ $item['id'] }}" @if($item['id'] == old('NewsCategoryId')) selected @endif>{{ $item['title'] }}</option>
                                    @empty
                                        <option value="0" selected>Нет категории</option>
                                    @endforelse

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Название:</label>
                                <input class="form-control" name="NewsTitle" type="text" placeholder="Default input" aria-label="default input example" value="{{old('NewsTitle')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">Текст:</label>
                                <textarea class="form-control" name="NewsText" aria-label="With textarea" >{{ old('NewsText') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-switch">
                                <input @if(old('NewsIsPrivate') === "1") checked @endif class="form-check-input" value="1" name="NewsIsPrivate" type="checkbox" id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Приватная новость</label>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">Добавить</button>
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

