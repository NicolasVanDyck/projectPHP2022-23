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

}
