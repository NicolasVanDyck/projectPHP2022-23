<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class UserTour extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
//    public function tour()
//    {
//        return $this->belongsTo(Tour::class)->withDefault();
//    }

    public function tours()
    {
        return $this->morphMany(Tour::class, 'tourable');
    }
    public function groupTour()
    {
        return $this->belongsTo(GroupTour::class)->withDefault();
    }

    public function startDate()
    {
        return Attribute::make(
            get: fn($value, $attributes) => GroupTour::find($attributes['group_tour_id'])->start_date,
        );
    }

    protected $appends = ['start_date'];

}
