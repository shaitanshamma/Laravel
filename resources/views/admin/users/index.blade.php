@extends('layouts.admin.admin')
@section('title') Список пользователей @endsection
@section('header')
    <h1 class="h2">Список пользователей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.users.create') }}"
               type="button" class="btn btn-sm btn-outline-secondary">Добавить пользователя</a>
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
            <th scope="col">Email</th>
            <th scope="col">Avatar</th>
            <th scope="col">Email confirmed</th>
            <th scope="col">Remember</th>
            <th scope="col">Last login</th>
            <th scope="col">Is admin</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->avatar }}</td>
                <td>{{ $user->email_verified_at }}</td>
                <td>{{ $user->remember_token }}</td>
                <td>{{ $user->last_login_at }}</td>
                <td>
                    @if($user->is_admin===1 )
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <a href=" {{ route('admin.users.edit', ['user' => $user]) }}" type="button" class="btn btn-success">Изменить</a>
                    <a href="javascript:;" rel="{{ $user->id }}" type="button" class="btn btn-danger delete">Удалить</a>
                </td>
            </tr>
        @empty
            <h1>Пользователей нет</h1>
        @endforelse
        </tbody>
    </table>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            const el = document.querySelectorAll('.delete');
            el.forEach(function (e, k) {
                e.addEventListener('click', function () {
                    const id = e.getAttribute("rel");
                    if (confirm(`Вы действительно хотите удалить автора с ID = ${id}?`)) {
                        send('/admin/users/' + id).then(() => {
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
