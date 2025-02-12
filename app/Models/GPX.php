<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GPX extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'amount_of_km',
        'name',
        'user_id',
        'route'
    ];

    public function tour()
    {
        return $this->hasOne(Tour::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function route(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value),
        );
    }
}
