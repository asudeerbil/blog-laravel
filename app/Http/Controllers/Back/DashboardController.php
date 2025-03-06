<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function index(){
        $articles=Article::all()->count();
        $hit=Article::sum('hit');
        $category=Category::all()->count();
        $iw=Page::all()->count();
        

        return view('back.dashboard',compact('articles','hit','category','iw'));

    }
    public function welcome(){
        $admin=Admin::first();
        return view('back.welcome',compact('admin'));
    }
}
