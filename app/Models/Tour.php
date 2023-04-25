<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
//        'route_id', deze er ook bij??
        'start_date',
        'end_date',
    ];

    public function routes()
    {
        return $this->belongsTo(Route::class);
    }

    public function usertours()
    {
        return $this->hasMany(UserTour::class);
    }

    public function grouptours()
    {
        return $this->hasMany(GroupTour::class);
    }
}
