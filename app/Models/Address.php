<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait; //***


class Address extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; //**
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'mobile',
        'pin_code',
        'locality',
        'address',
        'city_district_town',        
        'state',
        'land_mark' ,
        'alternate_phone',
        'address_type', 
        'user_id',
          
    ];

    public function listing()
    {
        return $this->$data;
    }


    
}
