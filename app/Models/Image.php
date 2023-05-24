<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function imagetypeName(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => ImageType::find($attributes['image_type_id'])->image_type,
        );
    }

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

    protected $appends = ['image_type_name'];
}
