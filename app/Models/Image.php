<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'path',
    ];

    public function imagetype($imagetype = null)
    {
        $this->belongsTo(ImageType::class)->withDefault([
            'image_type' => 'image',
        ]);
    }

    public function route()
    {
        $this->hasOne(Route::class);
    }
}
