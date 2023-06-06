<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class UserTour extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tour_id', 'group_tour_id'];

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
        return $this->belongsTo(GroupTour::class);
    }
    public function gpx()
    {
        return $this->belongsTo(Gpx::class, 'gpx_id');
    }

    public function startDate()
    {
        return Attribute::make(
            get: fn($value, $attributes) => GroupTour::find($attributes['group_tour_id'])->start_date,
        );
    }

    public function userName()
    {
        return Attribute::make(
            get: fn($value, $attributes) => User::find($attributes['user_id'])->name,
        );
    }



    protected $appends = ['start_date','user_name'];

}
