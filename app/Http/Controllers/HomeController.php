<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Magazine;
use App\Models\Popup;
use App\Models\Page;
use App\Models\NewsletterSubscriber;
use App\Models\Slide;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::all();
            // articles
            $articles = Article::with(['category', 'author'])->published()->get();
            $latest_articles = Article::with(['category', 'author'])->published()->latest()->limit(4)->get();
            $premium_articles = Article::with(['category', 'author'])->published()->premium()->latest()->limit(3)->get();
            $popular_articles = Article::with(['category', 'author'])->published()->orderBy('views', 'DESC')->limit(6)->get();

            // popup
            $currentDate = Carbon::now()->toDateString();
            $popups = Popup::where('start_date', '<=', $currentDate)->where('end_date', '>=', $currentDate)->where('status', 1)->first();

            // magazine
            $magazine = Magazine::with(['articles' => function (Builder $query) {
                $query->published();
            }])->latest()->first();

            // slider
            $slides = Slide::with('article')->where('status', true)->get();

            // dd($slides);

            return view('welcome', [
                'categories' => $categories,
                'articles' => $articles,
                'popups' => $popups,
                'magazine' => $magazine,
                'slides' => $slides,
                'latest_articles' => $latest_articles,
                'premium_articles' => $premium_articles,
                'popular_articles' => $popular_articles,
            ]);
        } catch (\Exception $error) {
            return abort(500, $error->getMessage());
        }
    }

    public function show_page(string $slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('view-page', ['page' => $page]);
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        if (NewsletterSubscriber::where('email', $request->email)->exists()) {
            return response()->json(['success' => false, 'message' => 'Email already exists in our subscription list.']);
        }

        NewsletterSubscriber::create(['email' => $request->email]);

        return response()->json(['success' => true, 'message' => 'Thank you for subscribing!']);
    }
}
