@extends("layouts.app")

@section('content')

<div class="container mt-5 mb-5">
    <div class="row mr-0 ml-0 mb-5">
        <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
    </div>
    <div class="card">
        <div class="card-head mt-2 ml-3">
            <h5>Edit vehicle request</h5>
        </div>
        <div class="card-body">
            {!! Form::open(['action' => ['VehicleRequestsController@update', $vehicle_request->id], 'method' => 'POST']) !!}
            <div class="form-group row">
                <div class="col-lg-6">
                    {{Form::label('requester_name', 'Requester')}}
                    {{Form::text('requester_name', $vehicle_request->requester_name, ['class' => 'form-control'] )}}
                </div>
                <div class="col-lg-6">
                    {{Form::label('requester_contactno', 'Contact no.')}}
                    {{Form::text('requester_contactno', $vehicle_request->requester_contactno, ['class' => 'form-control'] )}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-3">
                    {{Form::label('vehicle_id', 'Vehicle')}}
                    <select name="vehicle_id" class="form-control">
                        <option value="{{$vehicle_request->vehicle_id}}" style="display:none;">{{$vehicle_request->vehicle_name}}</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{$vehicle->id}}">{{$vehicle->vehicle_name}}</option>
                        @endforeach                    
                    </select>                            
                </div>
                <div class="col-lg-3">
                    {{Form::label('total_passengers', 'Total number of passengers')}}
                    {{Form::number('total_passengers', $vehicle_request->total_passengers, ['class' => 'form-control', 'min' => '1'] )}}                            
                </div>
                <div class="col-lg-6">
                    {{Form::label('destination', 'Destination')}}
                    {{Form::text('destination', $vehicle_request->destination, ['class' => 'form-control'] )}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                    {{Form::label('request_purpose', 'Purpose')}}
                    {{Form::textarea('request_purpose', $vehicle_request->request_purpose, ['class' => 'form-control'] )}}
                </div>           
            </div>
            <div class="form-group row">
                <div class="col-lg-3">
                    {{Form::label('date_from', 'Start Date')}}
                    {{Form::date('date_from', $vehicle_request->date_from, ['class' => 'form-control'])}}
                </div>           
                <div class="col-lg-3">
                    {{Form::label('date_to', 'End Date')}}
                    {{Form::date('date_to', $vehicle_request->date_to, ['class' => 'form-control'])}}
                </div>
                <div class="col-lg-3">
                    {{Form::label('time_from', 'Depart Time')}}
                    {{Form::time('time_from', $vehicle_request->time_from, ['class' => 'form-control'])}}
                </div>          
                <div class="col-lg-3">
                    {{Form::label('time_to', 'Return Time')}}
                    {{Form::time('time_to', $vehicle_request->time_to, ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="float-right">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            </div> 
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection