@extends("layouts.app")

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row mr-0 ml-0">
            <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
            @if($activity_request->request_status == 'pending')
                <a href="/activityrequest/{{$activity_request->id}}/edit">
                    <button type="button" class="btn btn-warning" style="float:right"><i class="fa fa-edit"></i></button>
                </a>
            @elseif($activity_request->request_status == 'approved')
                <a href="/"><button class="btn btn-dark btn-sm mr-1"><i class="fa fa-print"></i> Print Request</button></a>
            @endif
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h6>Activity Request No: {{$activity_request->id}}</h6>
                        <p><large>Request Status: {{$activity_request->request_status}}</large></p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h5>Activity Name: {{$activity_request->activity_name}}</h5>
                        <p><large>Category: {{$activity_request->activity_category}}</large></p>
                        <p><large>Venue: {{$activity_request->facility_name}} ({{$activity_request->schedule_status}})</large></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <p><small>Date created: {{$activity_request->created_at}}</small></p>
                    </div>
                    @if($activity_request->request_status == 'approved')
                        <div class="col-lg-4">
                            <p><small>Date approved: {{$activity_request->updated_at}}</small></p>
                            <p><small>Approved by: {{$activity_request->updated_at}}</small></p>
                        </div>  
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <p>Requester: {{$activity_request->requester_name}}</p>
                    </div>
                    <div class="col-lg-6">
                        <p>Contact no: {{$activity_request->requester_contactno}}</p>
                    </div>
                </div>
                <div class="row">
                        <div class="col-lg-6">
                            <p>Date: {{$activity_request->date_from}} - {{$activity_request->date_to}}</p>
                        </div>
                        <div class="col-lg-6">
                            <p>Time: {{$activity_request->time_from}} - {{$activity_request->time_from}}</p>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Activity Purpose: {{$activity_request->activity_purpose}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Requested Services: {{$activity_request->services_requested}}</p>
                    </div>
                </div>
            </div>
            @if($activity_request->request_status == 'declined')
                <div class="card-footer">
                    <div class="col-lg-12">
                        <p><small>Remarks: {{$activity_request->request_remarks}}</small></p>
                    </div>
                </div>                      
            @endif
        </div>
    </div>    
@endsection