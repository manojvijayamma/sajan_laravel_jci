<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait; //***

class Banner extends Authenticatable
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
        'position_id',
        'link_url',      
        'status',
        'image',
        'priority'
    ];
   
    public function position()
    {
        return $this->belongsTo('App\Models\BannerPosition', 'position_id', 'id');
    }

    
}
