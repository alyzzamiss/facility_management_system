<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Vehicle;
use App\VehicleRequest;

class VehicleRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Vehicle Requests';
        $vehicle_requests =  DB::table('vehicle_requests')
        ->join('vehicles', 'vehicles.id', 'vehicle_requests.vehicle_id')
        ->select('vehicle_requests.id', 'vehicle_requests.requester_name', 'vehicle_requests.destination',
                'vehicle_requests.date_from', 'vehicle_requests.date_to', 'vehicles.vehicle_name', 'vehicles.vehicle_driver',
                'vehicles.vehicle_plateno', 'vehicle_requests.request_status')
        ->where('vehicle_requests.is_deleted', 'false')
        ->get();

        return view('vehiclerequest.index')->with('title', $title)
                                            ->with('vehicle_requests', $vehicle_requests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Vehicle Request';
        $vehicles = Vehicle::where('vehicle_status', 'good condition')->get();

        return view('vehiclerequest.create')->with('title', $title)
                                            ->with('vehicles', $vehicles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle_requests = new VehicleRequest;
        $vehicle_requests->requester_name = $request->input('requester_name');
        $vehicle_requests->requester_contactno = $request->input('requester_contactno');
        $vehicle_requests->vehicle_id = $request->input('vehicle_id');
        $vehicle_requests->total_passengers = $request->input('total_passengers');
        $vehicle_requests->destination = $request->input('destination');
        $vehicle_requests->request_purpose = $request->input('request_purpose');
        $vehicle_requests->date_from = $request->input('date_from');
        $vehicle_requests->date_to = $request->input('date_to');
        $vehicle_requests->time_from = $request->input('time_from');
        $vehicle_requests->time_to = $request->input('time_to');
        $vehicle_requests->save();

        return redirect('/vehiclerequests')->with('success', 'Vehicle Request Created');
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
        //
    }
}
