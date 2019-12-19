<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait; //***

class ContentPositionRelations extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; //**

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content_id',           
        'position_id'
    ];

    
}
