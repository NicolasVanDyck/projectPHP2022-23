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

    public function Tour()
    {
        //belongsTo or hasMany
        return $this->belongsToMany(Tour::class);
    }

    public function Image()
    {
        //hasONe
        return $this->belongsTo(Image::class);
    }

    public function RouteBicyleType()
    {
        //belongsTo or hasMany
        return $this->belongsToMany(RouteBicyleType::class);
    }


}
