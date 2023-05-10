<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageType extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_type',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
