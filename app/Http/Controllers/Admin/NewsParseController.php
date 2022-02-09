<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Services\NewsParserService;
use Illuminate\Http\Request;

class NewsParseController extends Controller
{

    public function parseNews(Request $request, NewsParserService $parserService)
    {
        $link = $request->only('path');

        $items = $parserService->setLink($link['path'])->parse();

        $category = Category::query()->where('title', $items['title'])->first();


        if (!$category){
            $category = new Category();
            $category->title = $items['title'];
            $category->save();
        }

        foreach ($items['news'] as $item){

            $news = new News();

            $news->title = $item['title'];
            $news->source = $item['link'];
            $news->description = $item['description'];
            $news->created_at = $item['pubDate'];
            $news->save();
            $news->category()->attach($category->id);

        }
        return redirect()->route('admin.news.index')
            ->with('success', 'Парсинг успешно завершен');
    }

}
