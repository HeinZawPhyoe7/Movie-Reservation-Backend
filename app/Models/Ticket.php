<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'seat_number',
        'fee',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function movieDetail()
    {
        return $this->belongsTo(MovieDetail::class);
    }
}
