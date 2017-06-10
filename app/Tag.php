<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    protected $appends = ['service_url'];

    //relations

    public function Services()
    {
        return $this->belongsToMany('App\Service');
    }

    public function getServiceUrlAttribute()
    {
        return url('/service?by=' . $this->name);
    }
}
