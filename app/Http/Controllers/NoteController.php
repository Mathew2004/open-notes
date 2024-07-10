<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    //
    public function add()
    {
        if (Auth::check()) {
            return view('add-notes');
        } else {
            return redirect('login');
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'desc' => 'required',
            // 'link' => 'required',
            // 'file' => 'required|mimes:pdf|max:2048', // max 2MB
        ]);
        // Get User 
        $user = Auth::user();

        $note = new Notes;


        // Upload Pdf file
        if ($request->hasFile('file')) {
            $request->validate([
                'subject' => 'required',
                'desc' => 'required',
                'file' => 'required|mimes:pdf|max:2048',
            ]);

            $fileName = time() . '_' . $user->id . '_' . $request->subject . '.' . $request->file->extension();

            // $fileName->move('uploads/note', $filename);
            $request->file->move(public_path('uploads/note'), $fileName);
            $note->file = $fileName;
        } else {
            $request->validate([
                'subject' => 'required',
                'desc' => 'required',
                'link' => 'required',
            ]);
        }

        $note->user_id = $user->google_id;
        $note->subject = $request->subject;
        $note->desc = $request->desc;
        $note->link = $request->link;
        $note->thumbnail = $request->thumb;



        $note->save();

        $user->points += 20;

        $user->save();

        return redirect('/note' . '/' . $note->id)->with('note_add_msg', 'PDF file uploaded successfully. You Got 20 Points');



        // return redirect('/');

    }




    public function deleteNote($id)
    {
        $user = Auth::user();
        $google_id = $user->google_id;
        // Find Notes where id=$id and user_id=$google_id 
        $note = Notes::where('id', $id)->where('user_id', $google_id);

        if ($note) {
            $note->delete();
            return redirect('/dashboard')->with('message', 'Note deleted successfully');

        } else {
            return redirect('/dashboard')->with('error', 'Something Went Wrong!!');
        }


    }

    // Edit Notes
    public function editNotePage($id)
    {
        $user = Auth::user();
        $google_id = $user->google_id;
        $note = Notes::where('id', $id)->where('user_id', $google_id);
        $note = $note->first();
        if ($note) {
            return view('edit-note', compact('note'));
        } else {
            return redirect('/dashboard')->with('error', 'Something Went Wrong!!');
        }
    }
    public function editNote(Request $request, $id)
    {
        $user = Auth::user();
        $google_id = $user->google_id;
        $note = Notes::where('id', $id)->where('user_id', $google_id);
        $note = $note->first();
        if ($note) {
            $note->subject = $request->subject;
            $note->desc = $request->desc;
            $note->link = $request->link;
            $note->thumbnail = $request->thumb;
            $note->save();
            return redirect('/dashboard')->with('message', 'Note updated successfully');
        } else {
            return redirect('/dashboard')->with('error', 'Something Went Wrong!!');
        }

    }


    // View ALl Notes
    public function allNotes()
    {
        $notes = Notes::latest()->paginate(4);

        return view('all-notes', compact('notes'));
    }

    // Load More
    public function loadMoreNotes(Request $request)
    {
        $page = $request->input('page', 2);
        $notes = Notes::latest()->paginate(4, ['*'], 'page', $page);

        $html = '';
        foreach ($notes as $note) {
            $html .= view('components.search-notes', compact('note'))->render();
        }

        return response()->json([
            'html' => $html,
            'hasMorePages' => $notes->hasMorePages(),
        ]);
    }



    public function search(Request $request)
    {
        $search = $request->search;
        $notes = Notes::where('subject', 'LIKE', "%{$search}%")->get();

        $html = '';
        foreach ($notes as $note) {
            $html .= view('components.search-notes', compact('note'))->render();
        }
        return response()->json([
            'shtml' => $html,
        ]);
    }



}
