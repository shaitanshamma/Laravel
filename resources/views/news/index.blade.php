@extends('layouts/news/main')
@section('title')
    Список новостей @parent
@endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список новостей</h1>
        </div>
    </div>
@endsection
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($newsList as $newsItem)

            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                         xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                         preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>

                    <div class="card-body">
                        <div class="card-header">
                            <strong>
                                <a href="{{ route('news.show', ['id' => $newsItem->id]) }}">
                                    {{ $newsItem->title }}
                                </a>
                            </strong>
                        </div>
                        <p class="card-text">{!! $newsItem->description !!}</p>
                        <div>Автор: {{ $newsItem->author->lastname }}</div>
                        @foreach($newsItem->category as $category)
                            <small class="text-muted">{{ $category->title }}</small>
                        @endforeach
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href={{ route('news.show', ['id' => $newsItem->id]) }} type="button"
                                   class="btn btn-sm btn-outline-secondary">Смотреть подробнее
                                </a>
                            </div>
                            <small class="text-muted">{{ $newsItem->created_at }}</small>
                        </div>
                        <a href={{ $newsItem->source }} type="button"
                           class="link-dark">Источник
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <h1>Новостей нет</h1>
        @endforelse
    </div>
            {{ $newsList->links() }}
@endsection
