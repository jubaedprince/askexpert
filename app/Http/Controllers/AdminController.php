<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;

use App\Expert;
use App\Service;

class AdminController extends Controller
{
    public function expertManagement()
    {
    	$pending_experts = Expert::where('status', 'pending')->get();
        $approved_experts = Expert::where('status', 'approved')->get();
        $declined_experts = Expert::where('status', 'declined')->get();
        
        return view('admin.expert', compact('pending_experts', 'approved_experts', 'declined_experts'));
    }

    public function serviceManagement()
    {
    	$pending_services = Service::where('is_approved', false)->get();
    	$approved_services = Service::where('is_approved', true)->get();
        return view('admin.service', compact('user', 'pending_services', 'approved_services'));
    }


    public function meetingManagement()
    {
        $meeting_requests = Meeting::where('status', 'REQUEST')->get();
        return view('admin.meeting', compact('meeting_requests'));
    }
}
