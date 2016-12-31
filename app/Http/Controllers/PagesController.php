<?php

namespace App\Http\Controllers;

use App\Expert;
use Illuminate\Http\Request;

use App\Service;

class PagesController extends Controller
{
    public function home() 
    {
//    	$services = Service::getDisplayableService(); Not using services at this moment, it will be used as area of expertise

        $experts = Expert::all();
    	return view('pages.home', compact('experts'));
	}

	public function contact()
    {
        return view('pages.contact');
    }
}
