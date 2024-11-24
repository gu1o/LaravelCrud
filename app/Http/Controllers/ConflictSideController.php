<?php

namespace App\Http\Controllers;

use App\Models\ConflictSide;
use Illuminate\Http\Request;

class ConflictSideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conflictSide = ConflictSide::all();
        return view('conflicts-side.index', ['conflictSide' => $conflictSide]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ConflictSide $conflictSide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConflictSide $conflictSide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ConflictSide $conflictSide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConflictSide $conflictSide)
    {
        //
    }
}
