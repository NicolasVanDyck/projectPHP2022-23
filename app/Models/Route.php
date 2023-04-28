<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'startLocation',
        'endLocation',
    ];

    public function tours()
    {
        //belongsTo or hasMany
        return $this->hasMany(Tour::class);
    }

    public function image()
    {
        //hasONe
        return $this->hasOne(Image::class);
    }

    public function bicyleTypes()
    {
        //belongsTo or hasMany
        return $this->belongsToMany(BicycleType::class);
    }


}
