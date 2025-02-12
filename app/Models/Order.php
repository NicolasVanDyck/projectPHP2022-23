<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
    ];

    public function productsizes()
    {
        return $this->belongsTo(ProductSize::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
