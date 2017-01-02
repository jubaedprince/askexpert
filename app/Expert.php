<?php

namespace App;

use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use AlgoliaEloquentTrait;

    public $indices = ['experts'];

	protected $fillable = ['mobile', 'is_active', 'status', 'cost_per_minute', 'slug', 'profile_picture_url', 'number_of_complete_calls', 'current_occupation', 'youtube_video_url', 'bio'];

    protected $appends = ['youtube_video_id'];

    public function getAlgoliaRecord()
    {
       
        $this->user;

        return $this->toArray();
    }

    public function getYoutubeVideoIdAttribute()
    {
        if($this->youtube_video_url){
            $arr = explode('v=', $this->youtube_video_url);
            $arr = explode('&', $arr[1]);
            return $arr[0];
        }
        else{
            return null;
        }
    }

    public function makeApproved()
    {
    	$this->status = 'approved';
    	$this->is_active = true;
    	$this->save();
    }

    public function makeDeclined()
    {
    	$this->status = 'declined';
    	$this->is_active = false;
    	$this->save();
    }

    public function getPendingServices()
    {
        return Service::where('expert_id', $this->id)->where('is_approved', false)->get();
    }

    public function getApprovedServices()
    {
        return Service::where('expert_id', $this->id)->where('is_approved', true)->get();
    }
    //relationships
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function services()
    {
        return $this->hasMany('App\Service');
    }

    public function meetings()
    {
        return $this->hasMany('App\Meeting');
    }

    public function incrementNumberOfCompleteCall()
    {
        $this->number_of_complete_calls = $this->number_of_complete_calls + 1;
        $this->save();
    }

    public function decrementNumberOfCompleteCall()
    {
        if($this->number_of_complete_calls != 0){
            $this->number_of_complete_calls = $this->number_of_complete_calls - 1;
            $this->save();
        }
    }

}
