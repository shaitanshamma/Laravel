@extends('layouts.admin.admin')
@section('title') Админка @endsection
@section('header')
    <h1 class="h2">Панель администратора</h1>
@endsection

@section('content')

    <h2>Что парсим?</h2>
    <form method="post" action="{{ route('admin.parse') }}">
        @csrf
        <div class="form-group">
            <label for="path">Ссылка на новостной сайт
                @error('path') <strong style="color:red;">{{ $message }}</strong> @enderror
            </label>
            <input type="text" class="form-control" id="path" name="path" required>
        </div>
        <br>
        <button type="submit" class="btn btn-info" style="float: right;">Парсить</button>
    </form>

@endsection
