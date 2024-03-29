<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait; //***

class Download extends Authenticatable
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
        'parent_id',
        'status',
        'image',
        'priority'
    ];

  

    
}
