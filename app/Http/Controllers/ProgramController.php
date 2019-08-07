<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Program::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Program::create($this->validateData());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        //
    }

    private function validateData()
    {
        return request()->validate([
            'id' => 'integer',
            'partner_id' => 'integer',
            'code' => 'required',
            'active' => '',
            'name' => '',
            'full_name' => '',
            'partner' => '',
            'strategy' => '',
            'ltv' => '',
            'bu' => 'integer',
            'location' => '',
            'vertical' => '',
            'subvertical' => '',
            'type' => '',
            'level' => '',
            'priority' => '',
            'concentrations' => '',
            'tracks' => '',
            'accreditation' => '',
            'online_percent' => '',
            'start_year' => 'integer',
            'start_month' => 'integer',
            'entry_points' => 'integer',
            'renewal_date' => 'date'
        ]);
    }
}
