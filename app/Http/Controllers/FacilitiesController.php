<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Facility;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Facilities';
        $facilities = Facility::where('is_deleted', 'false')->get();

        return view('facility.index')->with('title', $title)
                                    ->with('facilities', $facilities);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add a facility';
        
        return view('facility.create')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facilities = new Facility;
        $facilities->facility_name = $request->input('facility_name');
        $facilities->facility_capacity = $request->input('facility_capacity');
        $facilities->facility_category = $request->input('facility_category');
        $facilities->facility_group = $request->input('facility_group');
        $facilities->save();

        return redirect('/facilities')->with('success', 'Facility Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::find($id);
        $facility->is_deleted = 'true';
        $facility->save();
        return redirect('/facilities')->with('success', 'Facility Removed');
    }
}
