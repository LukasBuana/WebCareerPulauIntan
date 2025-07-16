<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsDetailController extends Controller
{
    /**
     * Display the specified news article details.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\View\View
     */
    public function show(News $news)
    {
        // Anda bisa menambahkan logika untuk meningkatkan view count berita di sini jika diinginkan
        // $news->increment('views_count'); 

        return view('beranda.detail_berita', compact('news'));
    }
}