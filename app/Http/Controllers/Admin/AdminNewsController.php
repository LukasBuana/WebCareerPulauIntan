<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage; // TIDAK PERLU Storage lagi untuk Base64

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsArticles = News::latest()->paginate(10);
        return view('admin.news.index', compact('newsArticles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'subtitle' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi tetap sebagai file gambar
        ]);

        $base64Image = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $mimeType = $file->getMimeType(); // Dapatkan tipe MIME file (e.g., 'image/png')
            $base64Data = base64_encode(file_get_contents($file->getRealPath())); // Baca dan encode ke Base64
            $base64Image = "data:{$mimeType};base64,{$base64Data}"; // Bentuk string lengkap
        }

        News::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'category' => $request->category,

            'description' => $request->description,
            'image' => $base64Image, // Simpan string Base64 di DB
        ]);

        return redirect()->route('admin.news.index')->with('message', 'Berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'subtitle' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Gambar opsional untuk update
        ]);

        $base64Image = $news->image; // Pertahankan Base64 lama secara default
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $mimeType = $file->getMimeType();
            $base64Data = base64_encode(file_get_contents($file->getRealPath()));
            $base64Image = "data:{$mimeType};base64,{$base64Data}";
        }

        $news->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'category' => $request->category,

            'description' => $request->description,
            'image' => $base64Image, // Simpan string Base64 yang baru
        ]);

        return redirect()->route('admin.news.index')->with('message', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // Tidak perlu menghapus dari Storage karena gambar disimpan di DB
        $news->delete();
        return redirect()->route('admin.news.index')->with('message', 'Berita berhasil dihapus!');
    }
}