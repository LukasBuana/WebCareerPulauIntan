<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
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
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi tetap sebagai file gambar
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Generate a unique file name to prevent conflicts
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            // Store the file in 'public/news_images' disk (ensure you've configured a 'public' disk)
            // This will typically save to storage/app/public/news_images
            $imagePath = $file->storeAs('news_images', $fileName, 'public');
            // $imagePath will now be something like 'news_images/random_uuid.jpg'
        }

        News::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'category' => $request->category,

            'description' => $request->description,
            'image' => $imagePath, // Simpan string Base64 di DB
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
            'title' => 'required|string|max:256',
            'subtitle' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Gambar opsional untuk update
        ]);
        $imagePath = $news->image; // Keep the old image path by default

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            $file = $request->file('image');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('news_images', $fileName, 'public');
        }


        $news->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'category' => $request->category,

            'description' => $request->description,
            'image' => $imagePath, // Simpan string Base64 yang baru
        ]);

        return redirect()->route('admin.news.index')->with('message', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // Delete the image file from local storage if it exists
        // The 'image' attribute of the News model now holds the file path relative to the 'public' disk root.
        if ($news->image) { // Check if an image path exists for the news item
            // Use Storage::disk('public') to target the correct disk where the image is stored
            if (Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            } else {
                // Optional: Log a warning if the file path exists in DB but not on disk
                \Log::warning('News image file not found on disk for deletion: ' . $news->image);
            }
        }

        // Now delete the news record from the database
        $news->delete();

        return redirect()->route('admin.news.index')->with('message', 'Berita berhasil dihapus!');
    }
}