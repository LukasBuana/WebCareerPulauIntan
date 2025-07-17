<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;

use App\Models\News; // Import model News
use Illuminate\Http\Request;

class NewsListingController extends Controller
{
    /**
     * Display a listing of news articles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua berita terbaru dengan pagination
        $newsArticles = News::latest()->paginate(9); // Misal, 9 berita per halaman

        return view('beranda.news', compact('newsArticles')); // Nama view: news.index
    }
}