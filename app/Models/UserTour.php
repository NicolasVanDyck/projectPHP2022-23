<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTour extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function tour()
    {
        return $this->belongsTo(Tour::class)->withDefault();
    }
    public function groupTour()
    {
        return $this->belongsTo(GroupTour::class)->withDefault();
    }
}
