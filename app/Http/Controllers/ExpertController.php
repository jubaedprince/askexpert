<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Expert;

class ExpertController extends Controller
{
    public function index()
    {
        $experts = Expert::where('status', 'approved')->get();
        return view('expert.index', compact('experts'));
    }

    public function register()
    {
    	return view('expert.register');
    }

    public function processRegistration(Request $request)
    {
    	//validate
    	$this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'mobile' => 'required',
            'cost_per_minute' => 'required',
            'current_occupation' => 'required',
            'bio' => 'required|min:218'
        ]);

    	//create user
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        //assign expert role to user
        $expert_role = Role::where('name', '=', 'expert')->first();
        $user->roles()->attach($expert_role->id);

        //add user to expert table

        //generate unique slug
        $expert_slug = str_slug( $user->name, '-');
        $expert = Expert::where('slug', $expert_slug)->first();

        if($expert){
            $expert_slug = str_slug( $user->name . '-' . $user->id, '-');
        }

        $expert = new Expert(
            [
                'mobile' => $request['mobile'],
                'cost_per_minute' => $request['cost_per_minute'],
                'slug' => $expert_slug,
                'profile_picture_url' => '/images/profile_avatar_placeholder.png',
                'number_of_complete_calls' => 0,
                'current_occupation' => $request['current_occupation'],
                'bio' => $request['bio'],
            ]
        );
        $user->expert()->save($expert);

        return view('expert.registration_confirmation');
    }

    public function changeStatus(Request $request, $expert_id)
    {
        $this->validate($request, [
            'status' => 'required|in:approved,declined'
        ]);

        $expert = Expert::where('user_id', $expert_id)->first();
        if($expert)
        {

            if( $request['status'] == 'approved')
            {
                $expert->makeApproved();

            }elseif( $request['status'] == 'declined')
            {
                $expert->makeDeclined();
            }

            return redirect()->back(); //add message "Status changed"
        }
        else
        {
            return redirect()->back(); //add message "Couldn't find expert"
        }
    }

    public function profile(Request $request, $expert_slug)
    {
        $expert = Expert::where('slug', $expert_slug)->first();
        return view('expert.profile', compact('expert'));
    }

    public function incrementCallCounter(Expert $expert)
    {
        $expert->incrementNumberOfCompleteCall();
        return redirect()->back();
    }

    public function decrementCallCounter(Expert $expert)
    {
        $expert->decrementNumberOfCompleteCall();
        return redirect()->back();
    }

    public function updateProfilePicture(Request $request, Expert $expert)
    {
        $path =  $request->file('image')->store('public/profile_picture');
        $path = str_replace('public/', '/storage/', $path);
        $expert->profile_picture_url = $path;
        $expert->save();
        return response()->json([
            'success' => true,
            'profile_picture_url' =>  $expert->profile_picture_url
        ]);
    }

    public function edit(Expert $expert)
    {
        return view('expert.edit', compact('expert'));
    }

    public function update(Request $request, Expert $expert)
    {
        //validate
        $this->validate($request, [
            'name' => 'required|max:255',
            'mobile' => 'required',
            'cost_per_minute' => 'required',
            'current_occupation' => 'required',
            'bio' => 'required|min:218',
            'youtube_video_url' => '',
        ]);

        $expert->user->name = $request['name'];
        $expert->user->save();
        $expert->mobile = $request['mobile'];
        $expert->cost_per_minute = $request['cost_per_minute'];
        $expert->current_occupation = $request['current_occupation'];
        $expert->bio = $request['bio'];
        $expert->youtube_video_url = $request['youtube_video_url'];

        $expert->save();

        return redirect('/home');
    }

    public function reindex()
    {
        Expert::reindex();
        return redirect('home');
    }

    public function adminShow(Request $request, Expert $expert)
    {

        return view('expert.profile', compact('expert'));
    }

}
