<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait; //***


class Programe extends Authenticatable
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
        'image',
        'featured',
        'zone_id',
        'image',       
        'status',
        'details',
        'slug_url',
        'priority',
        'short_description'
               
             
    ];


}
