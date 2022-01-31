@extends('layouts.admin.admin')
@section('title') Список источников @endsection
@section('header')
    <h1 class="h2">Список источников</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.sources.create') }}"
               type="button" class="btn btn-sm btn-outline-secondary">Добавить источник</a>
        </div>

    </div>
@endsection
@section('content')
    @include('inc.message')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Path</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        @forelse($sources as $source)
            <tr>
                <td>{{ $source->id }}</td>
                <td>{{ $source->title }}</td>
                <td>{{ $source->path }}</td>
                <td>{{ $source->created_at }}</td>
                <td>{{ $source->updated_at }}</td>
                <td>
                    <a href=" {{ route('admin.sources.edit', ['source' => $source]) }}" type="button" class="btn btn-success">Изменить</a>
                    <a href="{{ route('admin.sources.destroy', ['source' => $source]) }}" type="button" class="btn btn-danger">Удалить</a>
                </td>
            </tr>
        @empty
            <h1>Источников нет</h1>
        @endforelse
        </tbody>
    </table>
@endsection
