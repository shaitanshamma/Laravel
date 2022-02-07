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
        <form method="post" action="{{ route('admin.users.update', ['user'=>$user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя
                    @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ $user->name }}">
                <label for="email">Email
                    @error('email') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <input type="text" class="form-control" id="email" name="email" required value="{{ $user->email }}">
                <label for="is_admin">isAdmin
                    @error('is_admin') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option @if($user->is_admin  === 1) selected @endif value="1">Yes</option>
                    <option @if($user->is_admin  === 0) selected @endif value="0">No</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection
