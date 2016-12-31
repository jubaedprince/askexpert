<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    //relations

    public function Services()
    {
        return $this->belongsToMany('App\Service');
    }
}
