@extends('layouts.admin.admin')
@section('title') Список авторов @endsection
@section('header')
    <h1 class="h2">Список авторов</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.authors.create') }}"
               type="button" class="btn btn-sm btn-outline-secondary">Добавить автора</a>
        </div>

    </div>
@endsection
@section('content')
    @include('inc.message')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        @forelse($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->lastname }}</td>
                <td>{{ $author->email }}</td>
                <td>{{ $author->created_at }}</td>
                <td>{{ $author->updated_at }}</td>
                <td>
                    <a href=" {{ route('admin.authors.edit', ['author' => $author]) }}" type="button" class="btn btn-success">Изменить</a>
                    <a href="{{ route('admin.authors.destroy', ['author' => $author]) }}" type="button" class="btn btn-danger">Удалить</a>
                </td>
            </tr>
        @empty
            <h1>Авторов нет</h1>
        @endforelse
        </tbody>
    </table>
@endsection
