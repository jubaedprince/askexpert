<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['requestor_name', 'requestor_phone_number', 'preferable_date',
        'preferable_time', 'estimated_duration', 'discussion_topics', 'status', 'note' ];

    //relations
    public function expert()
    {
        return $this->belongsTo('App\Expert');
    }
}
