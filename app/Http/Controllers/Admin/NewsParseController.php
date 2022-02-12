<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Category;
use App\Models\News;
use App\Services\NewsParserService;
use Illuminate\Http\Request;

class NewsParseController extends Controller
{

    public function parseNews(Request $request, NewsParserService $parserService)
    {
        $links = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
        ];

        foreach($links as $link) {
            dispatch(new NewsParsing($link));
        }

        return redirect()->route('admin.news.index')
            ->with('success', 'Парсинг успешно завершен');

    }

}
