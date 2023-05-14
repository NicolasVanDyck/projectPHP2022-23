<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTour extends Model
{
    use HasFactory;



    protected $fillable=[
        'startDate',
        'endDate', ];


    public function usertours()
    {
        //hasONe
        return $this->hasMany(Usertour::class);
    }

//    public function tour()
//    {
//        //hasONe
//        return $this->belongsTo(Tour::class);
//    }

    public function tours()
    {
        return $this->morphMany(Tour::class, 'tourable');
    }

    public function group(){

        return $this->belongsTo(Group::class);
    }

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

}
