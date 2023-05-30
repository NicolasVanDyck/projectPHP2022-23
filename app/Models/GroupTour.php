<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTour extends Model
{
    use HasFactory;



    protected $fillable=[
        'start_date',
        'end_date', ];

    protected function groupName(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => Group::find($attributes['group_id'])->group,
        );
    }


    public function usertours()
    {
        //hasONe
        return $this->hasMany(UserTour::class);
    }

    public function presences()
    {
        //hasONe
        return $this->hasMany(Presence::class);
    }


    public function tours()
    {
        return $this->morphMany(Tour::class, 'tourable');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function gpx()
    {
        return $this->belongsTo(GPX::class, 'tour_id', 'id');
    }


    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    protected $appends = ['group_name'];

}
