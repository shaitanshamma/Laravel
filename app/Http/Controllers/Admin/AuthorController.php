<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\CreateRequest;
use App\Http\Requests\Author\UpdateRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();

        return view('admin.authors.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.create');
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
            'name' => ['required', 'string', 'min:2'],
            'lastname' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'min:5'],
        ]);

        $data = $request->only(['name', 'lastname', 'email']);

        $created = Author::query()->create($data);

        if($created) {

            return redirect()->route('admin.authors.index')
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
     * @param Author $author
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin.authors.edit', [
            'author' =>$author ,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Author $author
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Author $author)
    {

        $data = $request->validated();

        $updated = $author->fill($data)->save();

        if($updated) {

            return redirect()->route('admin.authors.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Author $author)
    {
//        dd($author);
        try{
            $author->delete();
            return response()->json('ok');
        }catch(\Exception $e) {
            \Log::error("Error delete news item");
        }
    }
}
