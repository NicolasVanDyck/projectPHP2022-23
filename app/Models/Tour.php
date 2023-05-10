<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
//        'route_id', deze er ook bij??
        'start_date',
        'end_date',
    ];

    public function tourable()
    {
        return $this->morphTo();
    }

    public function route()
    {
        return $this->belongsTo(Route::class)->withDefault();
    }

    protected function startLocation(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => Route::find($attributes['route_id'])->start_location,
        );
    }

    protected $appends = ['start_location'];
}
