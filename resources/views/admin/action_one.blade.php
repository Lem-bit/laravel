@extends('layouts.app')

@section('title_name', 'Action ONE')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <br><br>
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    ACTION ONE
                </div>
            </div>
        </div>
    </div>
@endsection
