@extends('layouts.admin.admin')
@section('title') Админка @endsection
@section('header')
    <h1 class="h2">Панель администратора</h1>
@endsection

@section('content')

    <h2>Парсим?</h2>
    <form method="post" action="{{ route('admin.parse') }}">
        @csrf
        <button type="submit" class="btn btn-info" style="float: right;">Парсить</button>
    </form>

@endsection
