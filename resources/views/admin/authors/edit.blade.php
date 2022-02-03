@extends('layouts.admin.admin')
@section('title') Добавить автора @endsection
@section('header')
    <h1 class="h2">Добавить автора</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>

    </div>
@endsection
@section('content')
{{--    @include('inc.message')--}}
    <div>
        <form method="post" action="{{ route('admin.authors.update', ['author'=>$author]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя
                    @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ $author->name }}">
                <label for="lastname">Фамилия
                    @error('lastname') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <input type="text" class="form-control" id="lastname" name="lastname" required value="{{ $author->lastname }}">
                <label for="email">Email
                    @error('email') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <input type="text" class="form-control" id="email" name="email" required value="{{ $author->email }}">
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection
