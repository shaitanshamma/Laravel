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
{{--    @include('inc.message')--}}
    <div>
        <form method="post" action="{{ route('admin.sources.update', ['source'=>$source]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Имя
                    @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <input type="text" class="form-control" id="title" name="title" required value="{{ $source->title }}">
                <label for="path">Путь
                    @error('path') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <input type="text" class="form-control" id="path" name="path" required value="{{ $source->path }}">
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection
