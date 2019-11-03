@extends("layouts.app")

@section('content')

<div class="container mt-5 mb-5">
    <div class="row mr-0 ml-0">
        <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
    </div>
    <br>
    <div class="card">
        <h5 class="card-header">{{$title}}</h5>
        <table class="table">
            <thead class="thead-light">
                <tr align="center">
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact No.</th>
                    <th scope="col">Vehicle</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Driver</th>
                    <th scope="col">Date & Time</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($vehicle_requests) > 0)
                    @foreach ($vehicle_requests as $vehicle_request)
                        <tr align="center">  
                            <td>{{$vehicle_request->id}}</td>
                            <td>{{$vehicle_request->requester_name}}</td>
                            <td>{{$vehicle_request->requester_contactno}}</td>
                            <td>{{$vehicle_request->vehicle_name}} ({{$vehicle_request->vehicle_plateno}})</td>
                            <td>{{$vehicle_request->destination}}</td>
                            <td>{{$vehicle_request->vehicle_driver}}</td>
                            <td><small>{{$vehicle_request->date_from}} - {{$vehicle_request->date_to}}
                                    <br>{{$vehicle_request->time_from}} - {{$vehicle_request->time_to}}
                            </small></td>
                            <td>@if($vehicle_request->request_status == 'pending')
                                    <i class="fa fa-exclamation-circle icon-pending"></i>
                                @elseif($vehicle_request->request_status == 'approved')
                                    <i class="fa fa-check-circle icon-success" ></i>
                                @else
                                    <i class="fa fa-times-circle icon-danger"></i>
                                @endif
                            </td>
                            <td>
                                @if($vehicle_request->request_status == 'pending')
                                    <div class="btn-group" role="group">
                                        {!!Form::open(['action' => ['VehicleRequestsController@approve_update', $vehicle_request->id], 'method' => 'POST' ])!!}
                                            {{Form::hidden('_method', 'PUT')}}
                                            {{ Form::button('<i class="fa fa-check"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}
                                        {!!Form::close()!!}
                                        {!!Form::open(['action' => ['VehicleRequestsController@decline_update', $vehicle_request->id], 'method' => 'POST' ])!!}
                                            {{Form::hidden('_method', 'PUT')}}
                                            {{ Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                                        {!!Form::close()!!}
                                    </div>
                                @elseif($vehicle_request->request_status == 'approved')
                                    <a href="/"><button class="btn btn-dark btn-sm mr-1"><i class="fa fa-print"></i></button></a>
                                @else    
                                    <p><small>Remarks: {{$vehicle_request->request_remarks}}</small></p>
                                @endif
                            </td>
                        </tr>    
                        @endforeach
                    @else
                        <td colspan=6><center><p>No activity requests found!</p></center></td>     
                    @endif
            </tbody>
        </table>
    </div>
</div>
@endsection