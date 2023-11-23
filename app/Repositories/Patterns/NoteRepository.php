<?php

namespace App\Repositories\Patterns;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use App\Repositories\Interfaces\NoteInterface;
use Illuminate\Http\Request;

class NoteRepository implements NoteInterface{
    public function getall(Request $request){
        $notes = Note::userId($request)
        ->latest()
        ->paginate();
        return $notes;
    }


    public function create(NoteRequest $request){

        $userid = $request->user()->id;

        $note = Note::create([
            'title' => $request->title, 
            'content' => $request->content, 
            'users_id' => $userid
        ]);

        return $note;
    }


    public function getone(Request $request,string $id){
        $note = Note::userId($request)
        ->where('notes.id',$id)
        ->get();
        return $note;
    }


    public function update(NoteRequest $request, string $id){
        
        $note = Note::userId($request)->find($id);
        $note->title = $request->title; 
        $note->content = $request->content; 
        $note->update();

        return $note;
    }


    public function delete(Request $request ,string $id){
        $note = Note::userId($request)->find($id);
        $note->delete();
    }
}