<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title', 'cost_per_hour', 'description', 'is_approved', 'is_enabled'];

    //relationship
    public function expert()
    {
        return $this->belongsTo('App\Expert');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function makeApproved()
    {
    	$this->is_approved = true;
    	$this->save();
    }

    public function makeDeclined()
    {
    	$this->is_approved = false;
    	$this->save();
    }

    public static function getDisplayableService()
    {
        $services = Service::active()->enabled()->byActiveExpert()->get();
        return $services;
    }

    //scopes
    public function scopeActive($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    public function scopeByActiveExpert($query)
    {
        return $query->join('experts', 'services.expert_id', '=', 'experts.id')->where('is_approved', true)->where('experts.is_active', true);
    }
}
