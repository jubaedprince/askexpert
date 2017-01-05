<?php

namespace App\Http\Controllers;

use App\Expert;
use App\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function store(Request $request, Expert $expert)
    {
        //validate
        $this->validate($request, [ //add more specific validation
            'requestor_name' => 'required|max:255',
            'requestor_phone_number' => 'required',
            'preferable_date' => 'required',
            'preferable_time' => 'required',
            'estimated_duration' => 'required',
            'discussion_topics' => 'required',
        ]);

        //create service
        $meeting = new Meeting([
            'requestor_name' => $request['requestor_name'],
            'requestor_phone_number' => $request['requestor_phone_number'],
            'preferable_date' => $request['preferable_date'],
            'preferable_time' => $request['preferable_time'],
            'estimated_duration' => $request['estimated_duration'],
            'discussion_topics' => $request['discussion_topics'],
            'note' => '',
            'status' => 'REQUEST',

        ]);

        //get logged in expert


        //add service under expert
        $meeting->expert_id = $expert->id;
        $meeting->save();
        return response()->json([
           'success' => true,

        ]);

    }

    public function adminShow(Request $request, Meeting $meeting)
    {
        return view('meeting.show', compact('meeting'));
    }
}
