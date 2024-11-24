<?php

namespace App\Http\Controllers;

use App\Models\Side;
use Illuminate\Http\Request;

class SideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sides = Side::all();
        return view('sides.index', ['sides' => $sides]);
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
    public function show(Side $side)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Side $side)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Side $side)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Side $side)
    {
        //
    }
}
