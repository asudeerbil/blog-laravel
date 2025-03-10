<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\About;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class HomepageController extends Controller
{
    public function index()
    {
        $categories = Category::inRandomOrder()->get();
        $articles = Article::orderBy('created_at', 'DESC')->paginate(2);
        $articles->withPath(url('page'));
        return view('front.homepage', compact('categories', 'articles'));
    }
    public function single(Category $category, $slug)
    {
        $article = Article::whereSlug($slug)->whereCategoryId($category->id)->firstOrFail();
        $article->increment('hit');
        $categories = Category::inRandomOrder()->get();
        return view('front.single', compact('categories', 'article'));
    }
    public function category($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        $articles = Article::where('category_id', $category->id)->orderBy('created_at', 'DESC')->paginate(1);
        $categories = Category::inRandomOrder()->get();  // Kategorileri al
        return view('front.category', compact('category', 'articles', 'categories'));
    }
    public function page()
    {
        $page = Page::all();
        return view('front.page', compact('page'));
    }
    public function about()
    {
        $about = About::first();
        return view('front.about', compact('about'));
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function contactpost(ContactRequest $request)
    {
        Mail::to("asudeerbill@gmail.com")->queue(new ContactMail(
            $request->name,
            $request->email,
            $request->topic,
            $request->message
        ));

        return redirect()->route('contact')->with('success', 'Your message has been sent to us, thank you.');
    }
}
