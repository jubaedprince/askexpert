<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;
use App\Tag;
use Auth;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request['by'])){
            $services = Service::whereHas('tags', function ($query) use ($request) {
                $query->where('name', $request['by']);
            })->get();
        }else{
            $services = Service::all();
        }

        $disable_set_meeting = false;

        return view('service.index', compact('services', 'disable_set_meeting'));

    }
    public function create()
    {
        $tags = Tag::all();
    	return view('service.create', compact('tags'));
    }

    public function store(Request $request)
    {
    	//validate
    	$this->validate($request, [ //add more specific validation
            'title' => 'required|max:255',
//            'cost_per_hour' => 'required|integer',
            'description' => 'required',
            'tags' => 'required'
        ]);

   
    	//create service
        $service = new Service([
            'title' => $request['title'],
//            'cost_per_hour' => $request['cost_per_hour'],
            'cost_per_hour' => -1,
            'description' => $request['description'],
            'is_approved' => false,
            'is_enabled' => true
        ]);

        //get logged in expert
        $expert = Auth::user()->expert;

        //add service under expert
        $expert->services()->save($service);

        $service->tags()->sync($request['tags']);

        return redirect('/home'); //add message
        // return view('expert.registration_confirmation');
    }

    public function changeIsApproved(Request $request, $service_id)
    {
        $this->validate($request, [
            'status' => 'required|in:approved,declined'
        ]);

        $service = Service::findOrFail($service_id);
        if($service)
        {

            if( $request['status'] == 'approved')
            {
                $service->makeApproved();

            }elseif( $request['status'] == 'declined')
            {
                $service->makeDeclined();
            }

            return redirect()->back(); //add message "Is Approved changed"
        }
        else
        {
            return redirect()->back(); //add message "Couldn't find service"
        }
    }

    public function adminShow(Request $request, Service $service)
    {
        return view('service.show', compact('service'));
    }

    public function reindex()
    {
        Service::reindex();
        return redirect('home');
    }

}
