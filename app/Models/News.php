<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'category',
        'subtitle',
        'description',
        'image',
        'user_id',
    ];
    public function user()
    {
        // Hubungan Many-to-One: Berita ini dimiliki oleh satu user.
        // Asumsi: foreign key di tabel 'news' adalah 'user_id'
        // dan primary key di tabel 'users' adalah 'id'
        return $this->belongsTo(User::class);
    }

  
}