<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    //
    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function FBCallback()
    {

        $facebookUser = Socialite::driver('facebook')->stateless()->user();

        $findUser = User::where('google_id', $facebookUser->id)->first();

        if($findUser){
            Auth::login($findUser);
           
        }
        else{
            $user = User::updateOrCreate([
                'google_id' => $facebookUser->id,
            ], [
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'image' => $facebookUser->getAvatar(),
          
            ]);
            Auth::login($user);
        }
       
        return redirect('/dashboard');
        
    }
}
