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

    public function imageType()
    {
        $this->belongsTo(ImageType::class)->withDefault();
    }

    public function routes()
    {
        $this->hasMany(Route::class);
    }
}
