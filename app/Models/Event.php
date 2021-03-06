<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait; //***


class Event extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; //**
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'featured',
        'event_date',
        'time',
        'location',
        'status',
        'details',
        'image',
        'zone_id',
        'identifier',
        'slug_url',
        'priority',
        'short_description'
               
             
    ];


}
