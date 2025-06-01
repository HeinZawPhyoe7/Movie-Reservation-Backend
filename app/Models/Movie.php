<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'description',
        'images',
        'genre',
    ];

    protected $casts = [
        'images' => 'string',         // Cast images to string (base64 encoded)
    ];

    public function movie_details()
    {
        return $this->hasMany(MovieDetail::class);
    }
}
