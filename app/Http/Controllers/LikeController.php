<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Like;


class LikeController extends Controller
{
    //
    public function Addlike($id, Request $request)
    {
        $stat = $request->input('status');
        // $user_id = $request->input('user_id');
        $note_id = $id;

        $status = "";
        $like = new Like;

        if($stat == ""){
            
            $like->user_id = auth()->user()->google_id;
            $like->note_id = $note_id;
            $like->owner = $request->input('owner');
            $like->save();
            $status = "active";
            $likes = Like::where('note_id', $id)->count();
        
        }else{
            $like = Like::where('user_id', auth()->user()->google_id)->where('owner',$request->input('owner'))->where('note_id',$note_id);
            $like->delete();
            $likes = Like::where('note_id', $id)->count();
            
        }

        return response()->json([
            'status' => $status,
            'likes' => $likes,
         
        ]);

    }
}
