<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class NoteViewController extends Controller
{
    //
    public function viewNotes($id){
        $notes = Notes::find($id);
        $likes = Like::where('note_id', $id)->get();
        $likes_count = $likes->count();
        
        $notes->increment('views');
        if(Auth::check()){
            $likes_by_user = Like::where('note_id',$id)->where('user_id',auth()->user()->google_id);
            $status = "";
            if($likes_by_user->count() > 0){
                $status = "active";
            }
            return view('note-view', compact('notes','likes','status'));
        }
        

        if($notes){
            return view('note-view', compact('notes','likes'));
        }else{
            return redirect('/');
        }


        
    }
}
