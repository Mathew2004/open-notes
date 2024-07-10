<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Notes;
use App\Models\User;

class HomeController extends Controller
{
    
    public function index(){
        
        $notes = Notes::latest()->take(4)->get();

        // Top Contributors according to their points
        $top_contributors = User::all();
        $top_contributors = $top_contributors->sortByDesc('points')->take(10);


        

        return view('index', compact('notes','top_contributors'))->with('note_add_msg', 'PDF file uploaded successfully. You Got 20 Points');
    }
}
