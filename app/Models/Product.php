<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */
    public mixed $size;
    protected $fillable = [
        'name',
        'price',
    ];

    public function sizes()
    {
        return $this->belongsToMany(Size::class)
            ->withPivot('id');
    }

}
