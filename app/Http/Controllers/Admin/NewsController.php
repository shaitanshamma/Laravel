<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $news = $news = News::with('author')->with('category')->with('newsSource')->get();

        return view('admin/news/index', ['news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        $sources = NewsSource::all();
        return view('admin/news/create',[
            'categories'=>$categories,
            'authors'=>$authors,
            'sources'=>$sources
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {

        $data = $request->validated();

        $created = News::query()->create($data);

        if($created) {

            $created->category()->attach($request->input('categories'));

            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News  $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $authors = Author::all();
        $authorsSelect = Author::query()->where('id', $news->author_id)->first();
        $sourceSelect = NewsSource::query()->where('id', $news->source_id)->first();

        $sources = NewsSource::all();

        foreach ($authors as $item){
            if ($item->id == $authorsSelect[0]){
                var_dump(true);
            }
        }

        $selectCategories = \DB::table('news_with_categories')
            ->where('news_id', $news->id)
            ->get()
            ->map(fn($item) => $item->category_id)->toArray();

//        $authorsSelect = \DB::table('news_with_categories')
//            ->where('news_id', $news->id)
//            ->get()
//            ->map(fn($item) => $item->category_id)->toArray();

        return view('admin.news.edit',[
            'news'=>$news,
            'categories'=>$categories,
            'authors'=>$authors,
            'sources'=>$sources,
            'selectCategories' => $selectCategories,
            'authorsSelect'=>$authorsSelect,
            'sourceSelect'=>$sourceSelect,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update(UpdateRequest $request, News $news)
    {

        $data = $request->validated();

        $updated = $news->fill($data)->save();

        if($updated) {
            \DB::table('news_with_categories')
                ->where('news_id', $news->id)
                ->delete();

            foreach($request->input('categories') as $category) {
                \DB::table('news_with_categories')
                    ->insert([
                        'category_id' => intval($category),
                        'news_id' => $news->id
                    ]);
            }

            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(News $news)
    {
        try{
            $news->delete();
            return response()->json('ok');
        }catch(\Exception $e) {
            \Log::error("Error delete news item");
        }
    }
}
