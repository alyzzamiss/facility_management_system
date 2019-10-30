@extends("layouts.app")

@section('content')

<div class="container mt-5 mb-5">
    <div class="row mr-0 ml-0">
        <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
        <button class="btn btn-success btn-sm mr-1" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Vehicle</button>
        {{-- Add facility modal --}}
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new vehicle</h4>                            
                        <button type="button" class="close" data-dismiss="modal">&times;</button>   
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['action' => 'VehiclesController@store', 'method' => 'POST']) !!}
                        <div class="form-group row">
                            <div class="col-lg-12">
                                {{Form::label('vehicle_name', 'Vehicle')}}
                                {{Form::text('vehicle_name', '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-7">
                                {{Form::label('vehicle_driver', 'Driver')}}
                                {{Form::text('vehicle_driver', '', ['class' => 'form-control']) }}                         
                            </div>
                            <div class="col-lg-3">
                                {{Form::label('vehicle_plateno', 'Plate No.')}}
                                {{Form::text('vehicle_plateno', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="col-lg-2">
                                {{Form::label('vehicle_capacity', 'Capacity')}}
                                {{Form::number('vehicle_capacity', '', ['class' => 'form-control', 'placeholder' => '1', 'min' => '1'] )}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                {{Form::label('vehicle_remarks', 'Remarks')}}
                                {{Form::text('vehicle_remarks', '', ['class' => 'form-control', 'placeholder' => 'Aircon / No aircon'] )}}
                            </div>
                            <div class="col-lg-3">
                                {{Form::label('vehicle_status', 'Status')}}
                                <select name="vehicle_status" class="form-control">
                                    <option value="on repair">On Repair</option>
                                    <option value="good condition">Good Condition</option>
                                </select> 
                            </div>
                            <div class="col-lg-3">
                                {{Form::label('is_exclusive', 'Exclusive')}}
                                <select name="is_exclusive" class="form-control">
                                    <option value="true">Yes</option>
                                    <option value="false">No</option>
                                </select> 
                            </div>
                        </div>
                        <div class="float-right">
                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        </div> 
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        {{-- Add facility modal end--}}
    </div>
    <br>
    <div class="card">
        <h5 class="card-header">{{$title}}</h5>
        <div class="card-body">
            <div class="col col-lg-12 col-md-6">
                <table class="table table-responsive-md">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col"><center>No.</center></th>
                        <th scope="col"><center>Facility Name</center></th>
                        <th scope="col"><center>Capacity</center></th>
                        <th scope="col"><center>Driver</center></th>
                        <th scope="col"><center>Status</center></th>
                        <th scope="col"><center>Remarks</center></th>
                        <th scope="col"><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                         @if( count($vehicles) > 0)
                            @foreach ($vehicles as $vehicle)
                                <tr align="center">  
                                    <td>{{$vehicle->id}}</td>
                                    <td>{{$vehicle->vehicle_name}} ({{$vehicle->vehicle_plateno}})</td>
                                    <td>{{$vehicle->vehicle_capacity}}</td>
                                    <td>{{$vehicle->vehicle_driver}}</td>
                                    <td>{{$vehicle->vehicle_status}}</td>
                                    <td>{{$vehicle->vehicle_remarks}}</td>
                                    {{-- <td>{{$vehicle->is_exclusive}}</td> --}}
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="edit.php"><button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button></a>
                                            {!!Form::open(['action' => ['VehiclesController@destroy', $vehicle->id], 'method' => 'POST' ])!!}
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
                        </tr>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection