<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Flasher\Laravel\Facade\Flasher;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('back.categories.index',compact('categories'));
    }
    public function create(Request $request){

        $existingCategory = Category::where('slug', Str::slug($request->name))->first();

        if ($existingCategory) {
            Flasher::error('This category already exists!');
            return redirect()->back()->withInput();  // Formu yeniden gönderirken verileri kaybetmemek için withInput kullanabiliriz.
        }

        Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name), 

        ]);
        Flasher::success('Category created successfully!');
        return redirect()->back();
    }
    public function getData(Request $request){
        $category=Category::findOrFail($request->id);
        return response()->json($category);
    }
    public function update(Request $request){

        $existingCategory = Category::where('slug', Str::slug($request->name))
                            ->orWhere('name', $request->name)
                            ->first();

        if ($existingCategory) {
           Flasher::error('This category already exists!');
           return redirect()->back()->withInput();  
        }

        $category = Category::find($request->id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            
        ]);
        Flasher::success('Category updated successfully!');
        return redirect()->back();
    }
    public function delete(Request $request){
        $category=Category::find($request->id);
        $category->delete();
        Flasher::success('Category deleted successfully!');
        return redirect()->back();

    }
}
