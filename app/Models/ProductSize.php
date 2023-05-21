<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'product_size';

    protected $fillable = [];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function sizes()
    {
        return $this->belongsTo(Size::class);
    }
}
