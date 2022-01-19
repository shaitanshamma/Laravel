<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function news()
    {
        $news = $this->getNews();
        return view('/news/index', ['newsList'=>$news]);
    }

    public function showNews(int $id)
    {
        $news = $this->showNewsById($id);
        return view('/news/customNews', ['news'=>$news]);
    }
}
