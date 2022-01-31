@extends('layouts.admin.admin')
@section('title') Добавить категорию @endsection
@section('header')
    <h1 class="h2">Добавить категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>

    </div>
@endsection
@section('content')
    @include('inc.message')
    <div>
        <form method="post" action="{{ route('admin.categories.update', ['category'=>$category]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Наименование категории</label>
                <input type="text" class="form-control" id="title" name="title" required value="{{ $category->title }}">
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection
