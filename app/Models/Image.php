<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'image_type_id',
        'tour_id',
        'name',
        'description',
        'path',
    ];

    public function imagetype($imagetype = null)
    {
        $this->belongsTo(ImageType::class) ([
            'image_type' => 'image',
        ]);
    }

    public function tour()
    {
        $this->belongsTo(Tour::class);
    }
}
