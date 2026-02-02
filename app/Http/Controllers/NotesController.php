<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::with('user')
            ->get();

        return view('home', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string'
        ], [
            'title.required'=>'Een titel is wel nodig',
            'content.required'=>'Je moet wel wat in de inhoud zetten'
        ]);

        auth()->user()->notes()->create($validated);

        return redirect('/')->with('success', 'Notitie is aangemaakt');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $this->authorize('update', $note);

        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note )
    {
        $this->authorize('update', $note);

        $validated = $request->validate([
            'title'=> 'required|string',
            'content'=> 'required|string'
        ], [
            'title.required'=> 'Titel is nodig',
            'content.required'=>'Content van notitie is nodig'
        ]);

        $note->update($validated);

        return redirect('/')->with('success', 'Note was aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        // $this->authorize('delete', $note);

        $note->delete();

        return redirect('/')->with('success', 'Notitie is verwijderd');
    }
}
