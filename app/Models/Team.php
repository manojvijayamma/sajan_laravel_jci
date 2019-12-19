<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'title',
        'designation_id',
        'image',
        'year',
        'priority',
        'identifier',
        'zone_id'
    ];   


   

   
}
