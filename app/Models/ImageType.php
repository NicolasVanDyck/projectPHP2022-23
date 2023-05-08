<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageType extends Model
{
    use HasFactory;
//    use HasUuids;

    protected $fillable = [
<<<<<<< HEAD
        // todo: snake_case
=======
>>>>>>> main
        'image_type',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
