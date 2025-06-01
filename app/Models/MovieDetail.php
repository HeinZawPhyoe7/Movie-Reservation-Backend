<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieDetail extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    // Specify the attributes that should be cast to native types
    protected $casts = [
        'time_list' => 'array',  // Cast JSON column as an array
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
