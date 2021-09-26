<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //we can find the user information from auth user library in laravel
        $user = Auth::user();
        //we can also find the user id from auth id library in laravel
        $id = Auth::id();
        User::find($user);
        //dd($user);
        if ($user->profile ==null){
            $profile = Profile::create([
                'country' => 'Malaysia',
                'province' => '',
                'user_id' => $id,	
                'gender' => '',
                'facebook' => '',	
            ]);
        }
        return view('users.profile')->with('user', $user);
        
    }

        
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'country'=>'required',
            'province'=>'required',
            'gender'=>'required',
        ]);
        //find, save, are all functions inside the model, so we must use them in the model
        //
        $user   = User::find(Auth::id());
        //the first name is coming from database, 
        //the second name is coming from profile blade, and same for all variables
        $user->name=$request->name;//because the name is inside the user
        $user->profile->country=$request->country;// because it is inside the profile 
        $user->profile->province=$request->province;
        $user->profile->gender=$request->gender;// because it is inside the profile
        $user->save();
        $user->profile->save();

        //dd($request->all());

        if ($request->has('password')) {
            // bycrpt is for encryption
            $user->password=bcrypt($request->password);
           $user->save();
        }
        return redirect()->back();
    }

    
    public function destroy($id)
    {
        //
    }
}
