<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News; // Pastikan model News diimport

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

        // Ambil berita lain untuk "More News"
        // Kita ingin mengambil 4 berita terbaru yang BUKAN berita yang sedang dilihat saat ini.
        $news->load('user'); // Ini akan memuat data user yang terkait dengan $news

        $moreNews = News::where('id', '!=', $news->id) // Exclude the current news article
                        ->latest() // Order by latest (newest first)
                        ->limit(7) // Limit to 4 articles
                        ->get(); // Execute the query

        // Mengirimkan berita utama ($news) dan berita lainnya ($moreNews) ke view
        return view('beranda.detail_berita', compact('news', 'moreNews'));
    }
}