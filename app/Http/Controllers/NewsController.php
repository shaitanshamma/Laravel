<?php

namespace Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{

    public function news()
    {
        $newsModel = new News();
        $news = $newsModel->getNews();
        return view('/news/index', ['newsList' => $news]);
    }

    public function showNews(int $id)
    {
        $newsModel = new News();
        $news = $newsModel->getNewsById($id);
        return view('/news/customNews', ['news' => $news]);
    }
}
