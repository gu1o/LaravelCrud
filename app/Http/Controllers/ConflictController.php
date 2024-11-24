<?php

namespace App\Http\Controllers;

use App\Models\Conflict;
use Illuminate\Http\Request;

class ConflictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conflicts = Conflict::all();
        return view('conflicts.index', ['conflicts' => $conflicts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conflicts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date_format:d-m-Y',
            'end_date' => 'required|date_format:d-m-Y',
            'description' => 'nullable|string',
        ]);

        // create item
        Conflict::create($request->only('name','start_date','end_date','description'));

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('conflicts.index')->with('success', 'Conflict has been registered!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Conflict $conflicts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conflict $conflict)
    {
        return view('conflicts.edit', compact('conflict'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conflict $conflict)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date_format:d-m-Y',
            'end_date' => 'required|date_format:d-m-Y',
            'description' => 'nullable|string',
        ]);

        $conflict->update($request->only('name','start_date','end_date','description'));

        return redirect()->route('conflicts.index')->with('success', 'Conflict has been   updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conflict $conflict)
    {
        $conflict->delete();
        return response()->json(['message' => 'Conflict deleted successfully!'], 200);
    }


}
