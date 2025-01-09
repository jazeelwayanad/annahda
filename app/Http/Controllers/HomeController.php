<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Popup;
use App\Models\Page;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        try{
            $categories = Category::all();
            $articles = Article::with(['category','author'])->where('status', 'published')->get();
            $currentDate = Carbon::now()->toDateString();
            $popups = Popup::where('start_date', '<=', $currentDate)->where('end_date', '>=', $currentDate)->where('status', 1)->first();
            return view('welcome', [
                'categories' => $categories,
                'articles' => $articles,
                'popups' => $popups,
            ]);
        }catch(\Exception $error){
            return abort(500, $error->getMessage());
        }
    }

    public function getArticles($category)
    {
        // echo $category;
        $articles = Article::with(['category','author'])->where('status', 'published')->where('category_id', $category)->get();
        return view('article-list', [
            'articles' => $articles,
        ]);
    }

    public function show_page(string $slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('view-page', ['page' => $page]);
    }
}
