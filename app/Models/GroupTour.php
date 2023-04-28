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


    public function usertour()
    {
        //hasONe
        return $this->hasMany(Usertour::class);
    }

    public function tours()
    {
        //hasONe
        return $this->belongsTo(Tour::class);
    }
}
