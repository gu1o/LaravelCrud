<?php

namespace App\Http\Controllers;

use App\Models\ArmiesInvolved;
use Illuminate\Http\Request;

class ArmiesInvolvedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $armies = ArmiesInvolved::all();
        return view('armies-involved.index', ['armies' => $armies]);
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
    public function show(ArmiesInvolved $armiesInvolved)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArmiesInvolved $armiesInvolved)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArmiesInvolved $armiesInvolved)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArmiesInvolved $armiesInvolved)
    {
        //
    }
}
