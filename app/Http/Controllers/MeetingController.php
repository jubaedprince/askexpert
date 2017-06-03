<?php

namespace App\Http\Controllers;

use App\Expert;
use App\Mail\MeetingRequestReceived;
use App\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MeetingController extends Controller
{
    public function adminShow(Request $request, Meeting $meeting)
    {
        return view('meeting.show', compact('meeting'));
    }
}
