<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileUpdateController extends Controller
{
    //
    public function index(){
        return view('profile_update');
    }


    public function SaveProfile(Request $request){
           $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'telephone' => ['required','numeric','digits:10','starts_with:078,073,079','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        

            $user=User::find($request->user_id);
            $user->name = $request->name;
            $user->email= $request->email;
            $user->telephone =$request->telephone;
            $user->password = Hash::make($request->password);

            $user->save();
             return redirect('/home');

    }
}
