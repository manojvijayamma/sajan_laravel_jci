<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait; //***

class Gallery extends Model
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
        'parent_id',
        'large_image',
        'status',
        'identifier',
        'video_url'  ,
        'priority'    
    ];
}
