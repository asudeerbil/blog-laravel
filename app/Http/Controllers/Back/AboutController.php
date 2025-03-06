<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Str;
use Flasher\Laravel\Facade\Flasher;

class AboutController extends Controller
{
    public function index()
    {
        $abouts=About::orderBy('created_at','ASC')->get();
        return view('back.abouts.index',compact('abouts'));
    }
    public function edit(string $id)
    {
        $about=About::findOrFail($id);
        return view('back.abouts.update',compact('about'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'content' => 'required|min:10',
            
        ]);


        $about=About::findOrFail($id);
        $imageName = $about->image;
        if ($request->hasFile('image')) {
            // Eski resmi sil
            if ($about->image != 'default.jpg' && file_exists(public_path('images/' . $about->image))) {
                unlink(public_path('images/' . $about->image));
            }
    
            // Yeni resim adı
            $imageName = time().'.'.$request->image->extension(); 
            // Yeni resmi 'public/images' klasörüne kaydet
            $request->image->move(public_path('images'), $imageName);
        }
    

        $about->update([
            'name'=>$request->name,
            'content'=>$request->content,
            'slug' => Str::slug($request->name),
            'image' => $imageName,
            

        ]);

        Flasher::success('Article updated successfully!');
    
        return redirect()->route('admin.abouts.index');
    }
}
