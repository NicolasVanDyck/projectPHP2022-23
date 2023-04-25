<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
    ];

    public function productsizes()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsToMany(Productsize::class);
    }
}
