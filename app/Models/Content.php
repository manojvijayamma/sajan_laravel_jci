<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait; //***


class Content extends Authenticatable
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
        'status',
        'details',
        'parent_id' ,        
        'link_url' ,
        'link_type' ,
        'section_url',
        'slug_url',
        'seo_title',
        'seo_keywords',
        'seo_description'     
    ];

    public function childLevel1()
    {
        return $this->hasMany(self::class, 'parent_id','id');
    }
    public function childLevel2()
    {
        return $this->hasMany(self::class, 'parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id','id');
    }
    public function parent2()
    {
        return $this->belongsTo(self::class, 'parent_id','id');
    }
}
