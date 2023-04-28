<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Route;

class BicycleType extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];

public function routeBicyleType()
{
    //hasONe
    return $this->belongsToMany(Route::class);
}


}
