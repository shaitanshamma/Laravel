@extends('layouts.admin.admin')
@section('title') Список новостей @endsection
@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}"
               type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
        </div>
    </div>
@endsection
@section('content')
    @include('inc.message')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Img</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Source</th>
                <th scope="col">Author</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Operations</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $newsItem)
                <tr>
                    <td>{{ $newsItem->id }}</td>
                    <td>{{ $newsItem->title }}</td>
                    <td style="max-width: 20vw ">{{ $newsItem->description }}</td>
                    <td>{{ $newsItem->img }}</td>
                    <td>
                        @foreach($newsItem->category as $cat)
                            <p>{{ $cat->title }}</p>
                        @endforeach
                    </td>
                    <td>{{ $newsItem->status }}</td>
                    <td>{{ $newsItem->newsSource->title }}</td>
                    <td>{{ $newsItem->author->name }} {{ $newsItem->author->lastname }}</td>
                    <td>{{ $newsItem->created_at }}</td>
                    <td>{{ $newsItem->updated_at }}</td>
                    <td>
                        <a href=" {{ route('admin.news.edit', ['news' => $newsItem]) }}" type="button" class="btn btn-success">Изменить</a>
                        <a href="javascript:;" rel="{{ $newsItem->id }}" type="button" class="btn btn-danger delete">Удалить</a>
                    </td>
                </tr>
            @empty
                <h1>Новостей нет</h1>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll('.delete');
            el.forEach(function (e, k) {
                e.addEventListener('click', function() {
                    const id = e.getAttribute("rel");
                    if (confirm(`Вы действительно хотите удалить новость с ID = ${id}?`)) {
                        send('/admin/news/' + id).then(() => {
                            location.reload();
                        });
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            console.log(result)
            return result.ok;
        }
    </script>
@endpush

