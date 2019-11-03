<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ActivityRequest;
use App\FacilitySchedule;
use App\Facility;

class ActivityRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Activity Request';
        // $activity_requests = ActivityRequest::all();
        // $facility_schedules = FacilitySchedule::all();
        // $facilities = Facility:: all();
        
        $activity_requests = DB::table('activity_requests')
        ->join('facility_schedules', 'facility_schedules.activity_request_id', 'activity_requests.id')
        ->join('facilities', 'facilities.id', 'facility_schedules.facility_id')
        ->select('activity_requests.id', 'activity_requests.activity_name', 'activity_requests.date_from', 'activity_requests.date_to', 
                'activity_requests.activity_category', 'activity_requests.request_status', 'facilities.facility_name',
                'facility_schedules.schedule_status', 'activity_requests.time_from', 'activity_requests.time_to')
        ->where('activity_requests.is_deleted', 'false')
        ->where('facilities.facility_group', 'Place/Amenity')
        ->orderby('activity_requests.request_status', 'desc')
        ->get();

        return view('activityrequest.index')->with('title', $title)
                                            ->with('activity_requests', $activity_requests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Activity Request';
        $facilities = Facility::where('facility_group', 'Place/Amenity')->get();
        $equipments = Facility::where('facility_group', 'Equipment')->get();

        return view('activityrequest.create')->with('title', $title)
                    ->with('facilities', $facilities)
                    ->with('equipments', $equipments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $activity_requests = new ActivityRequest;
        $activity_requests->requester_name = $request->input('requester_name');
        $activity_requests->requester_contactno = $request->input('requester_contactno');
        $activity_requests->activity_name = $request->input('activity_name');
        $activity_requests->activity_category = $request->input('activity_category');
        $activity_requests->activity_purpose = $request->input('activity_purpose');
        $activity_requests->date_from = $request->input('date_from');
        $activity_requests->date_to = $request->input('date_to');
        $activity_requests->time_from = $request->input('time_from');
        $activity_requests->time_to = $request->input('time_to');
        // $activity_requests->services_requested= $request->input('services_requested1');
        $activity_requests->save();

        $last_insert_id = $activity_requests->id;
        
        $faclity_schedules = new FacilitySchedule;
        $faclity_schedules->activity_request_id = $last_insert_id;
        $faclity_schedules->facility_id = $request->input('venue_id');
        $faclity_schedules->save();

        $equipment_schedules = new FacilitySchedule;
        $equipment_schedules->activity_request_id = $last_insert_id;
        $equipment_schedules->facility_id = $request->input('equipment_id');
        $equipment_schedules->save();

        return redirect('/activityrequests')->with('success', 'Activity Request and Facility Schedule Created');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity_request = DB::table('activity_requests')
        ->join('facility_schedules', 'facility_schedules.activity_request_id', 'activity_requests.id')
        ->join('facilities', 'facilities.id', 'facility_schedules.facility_id')
        ->select('activity_requests.id', 'activity_requests.activity_name', 'activity_requests.date_from', 'activity_requests.date_to', 
                'activity_requests.activity_category', 'activity_requests.request_status', 'facilities.facility_name',
                'facility_schedules.schedule_status', 'activity_requests.created_at', 'activity_requests.updated_at', 'activity_requests.requester_name', 
                'activity_requests.requester_contactno', 'activity_requests.activity_purpose', 'activity_requests.request_remarks', 'activity_requests.services_requested', 
                'activity_requests.time_from', 'activity_requests.time_to', 'activity_requests.services_requested', 'activity_requests.request_remarks')
        ->where('activity_requests.id', $id)
        ->first();

        return view('activityrequest.show')->with('activity_request', $activity_request);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity_request = DB::table('activity_requests')
        ->join('facility_schedules', 'facility_schedules.activity_request_id', 'activity_requests.id')
        ->join('facilities', 'facilities.id', 'facility_schedules.facility_id')
        ->select('activity_requests.id', 'activity_requests.activity_name', 'activity_requests.date_from', 'activity_requests.date_to', 
                'activity_requests.activity_category', 'activity_requests.request_status', 'facilities.facility_name',
                'facility_schedules.schedule_status', 'activity_requests.created_at', 'activity_requests.updated_at', 'activity_requests.requester_name', 
                'activity_requests.requester_contactno', 'activity_requests.activity_purpose', 'activity_requests.request_remarks', 'activity_requests.services_requested', 
                'activity_requests.time_from', 'activity_requests.time_to', 'activity_requests.services_requested', 'activity_requests.request_remarks', 'facility_schedules.facility_id')
        ->where('activity_requests.id', $id)
        ->first();

        $facilities = Facility::where('facility_group', 'Place/Amenity')->get();
        $equipments = Facility::where('facility_group', 'Equipment')->get();

        return view('activityrequest.edit')->with('activity_request', $activity_request)
                                        ->with('facilities', $facilities)
                                        ->with('equipments', $equipments)
                                        ->with('success', 'Activity request successfully updated!');
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
        //update activty request
        $activity_request = ActivityRequest::find($id);
        $activity_request->requester_name = $request->input('requester_name');
        $activity_request->requester_contactno = $request->input('requester_contactno');
        $activity_request->activity_name = $request->input('activity_name');
        $activity_request->activity_category = $request->input('activity_category');
        $activity_request->activity_purpose = $request->input('activity_purpose');
        $activity_request->date_from = $request->input('date_from');
        $activity_request->date_to = $request->input('date_to');
        $activity_request->time_from = $request->input('time_from');
        $activity_request->time_to = $request->input('time_to');
        // $activity_requests->services_requested= $request->input('services_requested1');
        $activity_request->save();

        // $last_updated_id = $activity_requests->id;
        //redirect
        return redirect('/activityrequests')->with('success', 'Activity request updated successfully');
        // return redirect()->action('ActivityRequestsController@show', ['id' => $id]);

        
        
        // $faclity_schedule = DB::table('faclity_schedules')->where('faclity_schedules.activity_request_id', $last_updated_id)
        //                                                 ->;
        // $faclity_schedule->facility_id = $request->input('venue_id');
        // $faclity_schedule->save();

        // $faclity_schedule = DB::table('faclity_schedules')->where('faclity_schedules.activity_request_id', $last_updated_id);
        // $faclity_schedule->facility_id = $request->input('equipment_id');
        // $faclity_schedule->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity_request = ActivityRequest::find($id);
        $activity_request->is_deleted = 'true';
        $activity_request->save();

        return redirect('/activityrequests')->with('success', 'Activity Request Removed');
    }

    public function approve_index()
    {
        $title = 'Activity Request';
        $facilities = Facility:: all();
        
        $activity_requests = DB::table('activity_requests')
        ->join('facility_schedules', 'facility_schedules.activity_request_id', 'activity_requests.id')
        ->join('facilities', 'facilities.id', 'facility_schedules.facility_id')
        ->select('activity_requests.id', 'activity_requests.activity_name', 'activity_requests.date_from', 'activity_requests.date_to', 
                'activity_requests.activity_category', 'activity_requests.request_status', 'facilities.facility_name',
                'facility_schedules.schedule_status', 'activity_requests.time_from', 'activity_requests.time_to', 'activity_requests.request_remarks')
        ->where('activity_requests.is_deleted', 'false')
        ->where('facilities.facility_group', 'Place/Amenity')
        ->orderby('activity_requests.request_status', 'desc')
        ->get();

        return view('activityrequest.approve')->with('title', $title)
                                            ->with('activity_requests', $activity_requests);
    }

    public function approve_update($id)
    {
        $activity_request = ActivityRequest::find($id);
        $activity_request->request_status = 'approved';
        $activity_request->save();
        return redirect('/activityrequests')->with('success', 'Activity Request Approved');
    }

    public function decline_update($id)
    {
        $activity_request = ActivityRequest::find($id);
        $activity_request->request_status = 'declined';
        $activity_request->save();
        return redirect('/activityrequests')->with('success', 'Activity Request Declined');
    }

}
