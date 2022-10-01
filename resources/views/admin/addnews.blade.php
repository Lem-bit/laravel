@extends('layouts.app')

@section('title_name', 'Добавить новость')

@section('menu')
    @include('menu.menu')
@endsection

@section('content')

    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <form>
                    <fieldset>
                        <legend>Форма добавления новости</legend>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Категория:</label>
                            <select class="form-select" aria-label="Категория">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Название:</label>
                            <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
                        </div>

                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Текст:</label>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Приватная новость</label>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary btn-sm">Добавить</button>
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

