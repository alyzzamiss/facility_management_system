@extends("layouts.app")

@section('content')

<div class="container mt-5 mb-5">
    <div class="row mr-0 ml-0 mb-5">
        <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-head mt-2 ml-3">
                <h3>{{$title}}</h3>
            </div>
            <div class="card-body">
                {!! Form::open(['action' => 'FacilitiesController@store', 'method' => 'POST']) !!}
                <div class="form-group row">
                    <div class="col-lg-10">
                        {{Form::label('facility_name', 'Facility')}}
                        {{Form::text('facility_name', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="col-lg-2">
                        {{Form::label('facility_capacity', 'Capacity')}}
                        {{Form::number('facility_capacity', '', ['class' => 'form-control', 'placeholder' => '1', 'min' => '1'] )}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        {{Form::label('facility_category', 'Category')}}
                        <select name="facility_category" class="form-control">
                            <option value="Auditorium/Exhibition">Auditorium/Exhibition</option>
                            <option value="General Use">General Use</option>
                        </select>                            
                    </div>
                    <div class="col-lg-6">
                        {{Form::label('facility_group', 'Group')}}
                        <select name="facility_group" class="form-control">
                            <option value="Place/Amenity">Place/Amenity</option>
                            <option value="Equipment">Equipment</option>
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
@endsection