<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Flasher\Laravel\Facade\Flasher;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::orderBy('created_at','ASC')->get();
        return view('back.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('back.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|min:10',
        ]);


        Article::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'slug' => Str::slug($request->title), 
            'image' => 'default.jpg', 
        ]);
        Flasher::success('Article created successfully!');
    
        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article=Article::findOrFail($id);
        $categories=Category::all();
        return view('back.articles.update',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|min:10',
        ]);


        $article=Article::findOrFail($id);
        $article->update([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'content'=>$request->content,
            'slug' => Str::slug($request->title),

        ]);

        Flasher::success('Article updated successfully!');
    
        return redirect()->route('admin.articles.index');
    }

    public function switch(Request $request){
        $article=Article::findOrFail($request->id);
        $article->status=$request->statu=="true" ? 1 : 0;
        $article->save();
    }

    public function delete($id){
        Article::find($id)->delete();
        return redirect()->route('admin.articles.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
