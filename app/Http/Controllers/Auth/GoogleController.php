<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try{
            $user=Socialite::driver('google')->stateless()->user();
            $finduser=User::where('google_id',$user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('/home');
            }else{
               // dd($user);
                
                $newUser=User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'google_id'=>$user->id,
                'telephone'=>'0787031933',
                'password'=>encrypt('123456')

                ]);
                Auth::login($newUser);
                return redirect('/home');
                
            }
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
