<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title','parent_id','identifier'
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

    public function downloads()
    {
        return $this->hasMany('App\Models\Download', 'parent_id','id')->where('identifier','download');
    }

   
}
