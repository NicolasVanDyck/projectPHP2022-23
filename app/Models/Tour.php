<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

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

//    public function startLocation()
//    {
//        return Attribute::make(
//            get: fn($value, $attributes) => GPX::find($attributes['g_p_x_id'])->start_location,
//        );
//    }
//
//    public function endLocation()
//    {
//        return Attribute::make(
//            get: fn($value, $attributes) => GPX::find($attributes['g_p_x_id'])->end_location,
//        );
//    }
//
//
//    protected function amountOfKm(): Attribute
//    {
//        return Attribute::make(
//            get: fn($value, $attributes) => GPX::find($attributes['g_p_x_id'])->amount_of_km,
//        );
//    }
//
//    protected function routeName(): Attribute
//    {
//        return Attribute::make(
//            get: fn($value, $attributes) => GPX::find($attributes['g_p_x_id'])->name,
//        );
//    }
//
//
//    protected $appends = ['start_location','end_location','amount_of_km','name'];
}
