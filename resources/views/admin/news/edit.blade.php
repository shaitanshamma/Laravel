@extends('layouts.admin.admin')
@section('title') Изменить новость @endsection
@section('header')
    <h1 class="h2">Изменить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        </div>

    </div>
@endsection
@section('content')
    <div>
        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="categories">Выбрать категории</label>
                <select class="form-control" name="categories[]" id="categories" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if(in_array($category->id, $selectCategories)) selected @endif
                        >{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="author_id">Выбрать автора
                    @error('author_id') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <select class="form-control" name="author_id" id="author_id">
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}"
                                @if($author->id==$authorsSelect->id) selected @endif
                        >{{ $author->name }} {{ $author->lastname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="source">Источник
                    @error('source') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <input type="text" class="form-control" id="source" name="source" value="{{ $news->source }}">
            </div>
            <div class="form-group">
                <label for="title">Наименование
                    @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
            </div>

            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if($news->status  === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($news->status  === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание
                    @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
                </label>
                <textarea class="form-control" name="description" id="description">{{ $news->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="img">Изображение</label>
                <input type="file" class="form-control" id="img" name="img">
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection

@push('js')

    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endpush
