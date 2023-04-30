<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    public function orders()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsToMany(Order::class);
    }

    public function sizes()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsToMany(Size::class);
    }
}
