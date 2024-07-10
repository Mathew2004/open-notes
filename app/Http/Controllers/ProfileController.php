<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Notes;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function profile()
    {
        $users = Auth::user();
        if ($users) {
            $user_id = Auth::user()->google_id;
            // Select All notes where google_id == $user_id
            $notes = Notes::where('user_id', $user_id)->get();

            return view('profile/profile', compact('notes', 'users'));
        } else {
            return redirect('/login');
        }
    }


    public function edit(Request $request): View
    {
        $users = Auth::user();
        if($users){
            return view('user-info', [
                'user' => $request->user(),
                'edit' => true,

            ]);
        }
       else{
            return view('auth.login');
       }
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'roll' => 'required|unique:users,roll,' . $user->id,
            'department' => 'required',
            'series' => 'required',
        ], [
            'roll.unique' => 'Roll Number already exists',
        ]);
    

        $user->name = $request->name;
        $user->roll = $request->roll;
        $user->department = $request->department;
        $user->series = $request->series;
        $user->save();
    
        return redirect('/dashboard')->with('message', 'User updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function logout()
    {
        // logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/')->with('message', "Successfully Loggedout");


    }


    // Add Additional Information in User Profile
    public function additionalInfo(Request $request)
    {


        $user = $request->user();
        if ($user->roll != "") {
            return redirect("/");
        } else {
            return view("user-info");
        }
    }
    public function storeAdditionalInfo(Request $request)
    {
        // Unique Roll Number
        $request->validate([
            'roll' => 'required|unique:users,roll,',
            'department' => 'required',
            'series' => 'required',
            [
                'roll.unique' => 'Roll Number already exists',

            ]
        ]);
        $user = $request->user();

        // Update Roll where google_id=$user->google_id
        $user->roll = $request->roll;
        $user->department = $request->department;
        $user->series = $request->series;
        $user->save();
       
        return redirect("/")->with('message', "Welcome! Your Account is Created Successfully");
    }
}
