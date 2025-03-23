<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $articles = $category->articles()->with('category','author')->paginate(12);

        return view('public.blog.category', [
            'category' => $category,
            'articles' => $articles,
        ]);
    }

    public function article(string $category, string $article)
    {
        $article = Article::with(['category','tags','author'])->where('slug', $article)->first();
        $article->increment('views');
        $related_articles = Category::where('slug', $category)->first()->articles()->with('category','author')->limit(4)->get();

        return view('public.blog.article', ['article' => $article, 'related_articles' => $related_articles]);
    }
}
