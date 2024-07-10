<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notes;

class UserController extends Controller
{
    //
    public function users($id){
        $users = User::find($id);

        if($users){
            // Select all Notes where user_id = google_id
            $notes = Notes::where('user_id', $users->google_id)->get();

            return view('users',compact('notes','users'));
        }else{
            return redirect('/');
        }
        
        
    }
}
