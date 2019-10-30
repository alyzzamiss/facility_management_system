<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ActivityRequest;
use App\FacilitySchedule;
use App\Facility;

class FacilitySchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Facility Schedule Requests';
        $facility_schedules = DB::table('facility_schedules')
        ->join('activity_requests', 'activity_requests.id', 'facility_schedules.activity_request_id')
        ->join('facilities', 'facilities.id', 'facility_schedules.facility_id')
        ->select('facility_schedules.id', 'activity_requests.activity_name', 'activity_requests.date_from', 'activity_requests.date_to', 
                'activity_requests.activity_category', 'activity_requests.request_status', 'facilities.facility_name',
                'facility_schedules.schedule_status')
        ->where('activity_requests.is_deleted', 'false')
        ->get();

        return view('facilityschedule.index')->with('title', $title)
                                            ->with('facility_schedules', $facility_schedules);
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
    public function store(Request $request)
    {
        
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
        
    }
}
