<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\NewsSource;
use Illuminate\Http\Request;

class NewsSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $sources = NewsSource::all();

        return view('admin.sources.index', ['sources' => $sources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sources = NewsSource::all();
        $authors = Author::all();

        return view('admin.sources.create', [
            'categories' => $categories,
            'sources'=> $sources,
            'authors'=>$authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'path' => ['required', 'string', 'min:3'],
        ]);

        $data = $request->only(['title', 'path']);

        $created = NewsSource::query()->create($data);

        if($created) {

            return redirect()->route('admin.sources.index')
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
     * @param NewsSource $source
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(NewsSource $source)
    {
        return view('admin.sources.edit', [
            'source' => $source,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param NewsSource $source
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, NewsSource $source)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'path' => ['required', 'string', 'min:3'],
        ]);

        $data = $request->only(['title', 'path']);


        $updated = $source->fill($data)->save();

        if($updated) {

            return redirect()->route('admin.sources.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param NewsSource $source
     * @return void
     */
    public function destroy(NewsSource $source)
    {
        //
    }
}