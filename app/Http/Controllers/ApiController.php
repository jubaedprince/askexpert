<?php

namespace App\Http\Controllers;

use App\Expert;
use App\Mail\MeetingRequestReceived;
use App\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    public function getExpertCost($expert){
        try{
            $expert= Expert::find($expert);
            $cost_per_minute = $expert->cost_per_minute;

            return response()->json([
                'data' => [
                    'rate' => $cost_per_minute
                ]
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'error' => [
                    'message' => $exception->getMessage(),
                    'line' => $exception->getLine(),
                    'file' => $exception->getFile(),
                ]
            ]);
        }
    }

    public function storeMeetingRequest(Request $request, Expert $expert)
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


        Mail::to(env('ADMIN_EMAIL', 'jubaedprince@gmail.com'))->send(new MeetingRequestReceived($meeting));

        return response()->json([
            'data' => [
                'message' => 'We shall contact you shortly.'
            ]
        ]);

    }
}
