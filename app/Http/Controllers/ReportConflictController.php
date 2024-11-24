<?php

namespace App\Http\Controllers;

use App\Models\ReportConflict;
use Illuminate\Http\Request;

class ReportConflictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reportConflicts = ReportConflict::all();
        return view('report-conflicts.index', ['reportConflicts' => $reportConflicts]);
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
    public function show(ReportConflict $reportConflict)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportConflict $reportConflict)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportConflict $reportConflict)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportConflict $reportConflict)
    {
        //
    }
}
