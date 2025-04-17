<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function index()
    {
        $archive = Magazine::all()->groupBy('year')->all();

        // foreach($archive as $item){
        //     dump($item);
        // }
        // dd($archive);

        return view('public.archive.index', [
            'archive' => $archive
        ]);
    }

    public function show(string $year, string $start, string $end)
    {
        $magazine = Magazine::with('articles')
        ->where([
            'year' => $year,
            'start_month' => Carbon::parse($start)->month,
            'end_month' => Carbon::parse($end)->month,
        ])->first();

        // dd($magazine);
        if(!$magazine){
            return abort(404, "Related magazine not found!");
        }

        $main_articles = $magazine->articles()->take(5)->get();
        $all_articles = $magazine->articles()->skip(6)->paginate(10);

        // dump($main_articles);
        // dd($all_articles);

        return view('public.archive.view', [
            'magazine' => $magazine,
            'year' => $year,
            'start_month' => $start,
            'end_month' => $end,
            'main_articles' => $main_articles,
            'all_articles' => $all_articles,
        ]);
    }
}
