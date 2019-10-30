@extends("layouts.app")

@section('content')

<div class="container mt-5 mb-5">
    <div class="row mr-0 ml-0">
        <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
        <a href="/create_vehiclerequest"><button class="btn btn-success btn-sm mr-1"><i class="fa fa-plus"></i> Create Vehicle Request</button></a>
        <a href=""><button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Approve Request</button></a>
    </div>
    <br>
    <div class="card">
        <h5 class="card-header">{{$title}}</h5>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr align="center">
                    <th scope="col">No.</th>
                    <th scope="col">Requester Name</th>
                    <th scope="col">Vehicle</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Driver</th>
                    <th scope="col">Date</th>
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
                                <td>{{$vehicle_request->vehicle_name}} {{$vehicle_request->vehicle_plateno}}</td>
                                <td>{{$vehicle_request->destination}}</td>
                                <td>{{$vehicle_request->vehicle_driver}}</td>
                                <td>{{$vehicle_request->date_from}} - {{$vehicle_request->date_to}}</td>
                                <td>{{$vehicle_request->request_status}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal1"><i class="fa fa-edit"></i></button>
                                        {{-- Edit vehicle modal --}}
                                        <div class="modal fade" id="myModal1" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Vehicle</h4>                            
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>   
                                                    </div>
                                                    <div class="modal-body" align="left">
                                                        {{-- {!! Form::open(['action' => 'FacilitiesController@update', 'method' => 'POST']) !!} --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Edit facility modal end--}}
                                        {!!Form::open(['action' => ['VehicleRequestsController@destroy', $vehicle_request->id], 'method' => 'POST' ])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                                        {!!Form::close()!!}
                                    </div>   
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
</div>
@endsection