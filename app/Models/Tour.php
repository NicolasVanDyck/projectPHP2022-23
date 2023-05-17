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

    public function gpx()
    {
        return $this->hasOne(GPX::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function startLocation()
    {
        return Attribute::make(
            get: fn($value, $attributes) => GPX::find($attributes['gpx_id'])->start_location,
        );
    }

    public function endLocation()
    {
        return Attribute::make(
            get: fn($value, $attributes) => GPX::find($attributes['gpx_id'])->end_location,
        );
    }

}
