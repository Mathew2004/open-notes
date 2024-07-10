<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {

        $googleUser = Socialite::driver('google')->stateless()->user();

        $findUser = User::where('google_id', $googleUser->id)->first();

        if($findUser){
            Auth::login($findUser);
            $findUser->updated_at = time();
            $findUser->save();
            return redirect('/user-info');
        }
        else{
            $user = User::updateOrCreate([
                'google_id' => $googleUser->id,
            ], [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'image' => $googleUser->getAvatar(),
          
            ]);
            $findUser->updated_at = time();
            $findUser->save();
            Auth::login($user);
            return redirect('/user-info');
        }
       
       
        
    }

}
