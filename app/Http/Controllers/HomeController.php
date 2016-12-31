<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Expert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->isExpert())
        {
            $pending_services = $user->expert->getPendingServices();
            $approved_services = $user->expert->getApprovedServices();
            return view('expert.home', compact('user', 'pending_services', 'approved_services'));

        } 

        if($user->hasRole('admin'))
        {
            return view('admin.home');
        }

        return view('home');
    }
}
