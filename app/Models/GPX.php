<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GPX extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'start_location',
        'end_location',
        'amount_of_km',
        'name',
    ];

    public function tour()
    {
        return $this->hasOne(Tour::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
