<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $newsList = News::query()->paginate(9);

        return view('news.index',['newsList'=>$newsList]);
    }
}
