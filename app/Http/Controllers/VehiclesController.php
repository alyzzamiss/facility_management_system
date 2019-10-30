<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Vehicle;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $title = 'Vehicles';
       $vehicles = Vehicle::where('is_deleted', 'false')->get();

       return view('vehicle.index')->with('title', $title)
                                    ->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicles = new Vehicle;
        $vehicles->vehicle_name = $request->input('vehicle_name');
        $vehicles->vehicle_plateno = $request->input('vehicle_plateno');
        $vehicles->vehicle_capacity = $request->input('vehicle_capacity');
        $vehicles->vehicle_driver = $request->input('vehicle_driver');
        $vehicles->vehicle_status = $request->input('vehicle_status');
        $vehicles->vehicle_remarks = $request->input('vehicle_remarks');
        $vehicles->is_exclusive = $request->input('is_exclusive');
        $vehicles->save();

        return redirect('/vehicles')->with('success', 'Vehicle Created');
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
        //
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
        $vehicle = Vehicle::find($id);
        $vehicle->is_deleted = 'true';
        $vehicle->save();
        return redirect('/vehicles')->with('success', 'Vehicle Removed');
    }
}
