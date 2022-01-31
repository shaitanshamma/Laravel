@extends('layouts.admin.admin')
@section('title') Добавить источник @endsection
@section('header')
    <h1 class="h2">Добавить источник</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>

    </div>
@endsection
@section('content')
    @include('inc.message')
    <form method="post" action="{{ route('admin.sources.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Имя</label>
            <input type="text" class="form-control" id="title" name="title" required>
            <label for="path">Путь</label>
            <input type="text" class="form-control" id="path" name="path" required>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
@endsection
