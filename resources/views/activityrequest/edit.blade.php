@extends("layouts.app")

@section('content')

<div class="container mt-5 mb-5">
    <div class="row mr-0 ml-0 mb-5">
        <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
    </div>
    <div class="card">
        <div class="card-head mt-2 ml-3">
            <h5>Edit activity request</h5>
        </div>
        <div class="card-body">
            {!! Form::open(['action' => ['ActivityRequestsController@update', $activity_request->id], 'method' => 'POST']) !!}
            <div class="form-group row">
                <div class="col-lg-6">
                        {{Form::label('requester_name', 'Requester')}}
                        {{Form::text('requester_name', $activity_request->requester_name, ['class' => 'form-control'] )}}
                </div>           
                <div class="col-lg-6">
                    {{Form::label('requester_contactno', 'Contact no.')}}
                    {{Form::text('requester_contactno', $activity_request->requester_contactno, ['class' => 'form-control'] )}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    {{Form::label('activity_name', 'Activity Name')}}
                    {{Form::text('activity_name', $activity_request->activity_name, ['class' => 'form-control'] )}}
                </div>
                <div class="col-lg-6">
                    {{Form::label('activity_category', 'Activity Category')}}
                    <select name="activity_category" class="form-control">
                        <option value="{{$activity_request->activity_category}}" style="display:none;">{{$activity_request->activity_category}}</option>
                        <option value="Co-curricular">Co-curricular</option>
                        <option value="Extra Co-curricular">Extra Co-curricular</option>
                    </select>
                </div>           
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                    {{Form::label('activity_purpose', 'Purpose')}}
                    {{Form::textarea('activity_purpose', $activity_request->activity_purpose, ['class' => 'form-control', 'placeholder' => 'Please provide a purpose for your activity.'] )}}
                </div>           
            </div>
            <div class="form-group row">
                <div class="col-lg-3">
                    {{Form::label('date_from', 'Start Date')}}
                    {{Form::date('date_from', $activity_request->date_from, ['class' => 'form-control'])}}
                </div>           
                <div class="col-lg-3">
                    {{Form::label('date_to', 'End Date')}}
                    {{Form::date('date_to', $activity_request->date_to, ['class' => 'form-control'])}}
                </div>
                <div class="col-lg-3">
                    {{Form::label('time_from', 'Start Time')}}
                    {{Form::time('time_from', $activity_request->time_from, ['class' => 'form-control'])}}
                </div>           
                <div class="col-lg-3">
                    {{Form::label('time_to', 'End Time')}}
                    {{Form::time('time_to', $activity_request->time_to, ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    {{Form::label('venue_id', 'Venue')}}
                    <select name="venue_id" class="form-control">
                        <option value="{{$activity_request->facility_id}}" style="display:none;">{{$activity_request->facility_name}}</option>
                        @foreach($facilities as $facility)
                            <option value="{{$facility->id}}">{{$facility->facility_name}}</option>
                        @endforeach
                    </select>                            
                </div>
                <div class="col-lg-6">
                    {{Form::label('venue_id', 'Equipment')}}
                    <select name="equipment_id" class="form-control">
                        {{-- <option value="{{$activity_request->facility_id}}" style="display:none;">{{$activity_request->facility_name}}</option> --}}
                        @foreach($equipments as $equipment)
                            <option value="{{$equipment->id}}">{{$equipment->facility_name}}</option>
                        @endforeach
                    </select>                            
                </div>           
            </div>
            <div class="form-group row">
                <div class="col-lg-3">
                    {{Form::label('', 'Required Services')}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-3">
                    {{Form::checkbox('services_requested1', 'Janitorial Service (PPD)')}}
                    {{Form::label('services_requested1', 'Janitorial Service (PPD)')}}
                </div>
                <div class="col-lg-3">  
                    {{Form::checkbox('services_requested2', 'Electrical/Lighting Setup (PPD)')}}
                    {{Form::label('services_requested2', 'Electrical/Lighting Setup (PPD)')}}                     
                </div>
                <div class="col-lg-6"> 
                    <div class="form-group row">
                        <div class="col-lg-3">  
                            {{Form::label('services_requested3', 'Others')}}
                        </div>
                        <div class="col-lg-9">                     
                            {{Form::text('services_requested3', '', ['class' => 'form-control', 'placeholder' => 'others services'] )}}
                        </div>
                    </div>
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