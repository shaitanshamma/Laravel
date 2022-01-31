<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{

    public function news()
    {

        $news = News::with('author')->with('category')->with('newsSource')->paginate(3);

        return view('/news/index', ['newsList' => $news]);
    }

    public function showNews(int $id)
    {
        $news = News::query()->find($id);

        return view('/news/customNews', ['news' => $news]);
    }

}
