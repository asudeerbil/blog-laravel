<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use Flasher\Laravel\Facade\Flasher;

class PageController extends Controller
{
    public function index()
    {
        $pages=Page::orderBy('created_at','ASC')->get();
        return view('back.pages.index',compact('pages'));
    }
    public function create(){
        $pages=Page::all();
        return view('back.pages.create',compact('pages'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $totalPages = Page::count();
        $newOrder = $totalPages + 1;


        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension(); // Dosya adı
            $request->image->move(public_path('images'), $imageName); // Resmi 'public/images' klasörüne kaydet
        } else {
            $imageName = 'default.jpg'; // Varsayılan resim adı
        }


        Page::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title), 
            'image' => $imageName, 
            'order' => $newOrder
        ]);
        Flasher::success('Inspirational writing created successfully!');
    
        return redirect()->route('admin.pages.index');
    }
    public function edit(string $id)
    {
        $page=Page::findOrFail($id);
        return view('back.pages.update',compact('page'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $page=Page::findOrFail($id);
        $imageName = $page->image;
        if ($request->hasFile('image')) {
            // Eski resmi sil
            if ($page->image != 'default.jpg' && file_exists(public_path('images/' . $page->image))) {
                unlink(public_path('images/' . $page->image));
            }
    
            // Yeni resim adı
            $imageName = time().'.'.$request->image->extension(); 
            // Yeni resmi 'public/images' klasörüne kaydet
            $request->image->move(public_path('images'), $imageName);
        }
    

        $page->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'slug' => Str::slug($request->title),
            'image' => $imageName,
            'order' => $page->order,

        ]);

        Flasher::success('Article updated successfully!');
    
        return redirect()->route('admin.pages.index');
    }
    public function delete($id){
        Page::find($id)->delete();
        return redirect()->route('admin.pages.index');
    }
}
