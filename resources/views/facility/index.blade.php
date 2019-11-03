@extends("layouts.app")

{{-- Add facility modal --}}
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add new facility</h4>                            
                <button type="button" class="close" data-dismiss="modal">&times;</button>   
            </div>

            {{ csrf_field() }}
            <div class="modal-body">
                {!! Form::open(['action' => 'FacilitiesController@store', 'method' => 'POST']) !!}
                <div class="form-group row">
                    <div class="col-lg-9">
                        {{Form::label('facility_name', 'Facility')}}
                        {{Form::text('facility_name', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="col-lg-3">
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
{{-- Add facility modal end--}}

{{-- Edit facility modal --}}
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit facility</h4>                            
                <button type="button" class="close" data-dismiss="modal">&times;</button>   
            </div>

            {{ csrf_field() }}
            <div class="modal-body">
                {!! Form::open(['action' => 'FacilitiesController@update', 'method' => 'POST']) !!}
                <div class="form-group row">
                    <div class="col-lg-9">
                        {{Form::label('facility_name', 'Facility')}}
                        {{Form::text('facility_name', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="col-lg-3">
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
{{-- Edit facility modal end--}}

@section('content')

<div class="container mt-5 mb-5">
    <div class="row mr-0 ml-0">
        <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
        <button class="btn btn-success btn-sm mr-1" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add Facility</button>
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
                        <th scope="col"><center>Category</center></th>
                        <th scope="col"><center>Group</center></th>
                        <th scope="col"><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                         @if( count($facilities) > 0)
                            @foreach ($facilities as $facility)
                                <tr align="center">  
                                    <td>{{$facility->id}}</td>
                                    <td>{{$facility->facility_name}}</td>
                                    <td>{{$facility->facility_capacity}}</td>
                                    <td>{{$facility->facility_category}}</td>
                                    <td>{{$facility->facility_group}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></button>
                                            {!!Form::open(['action' => ['FacilitiesController@destroy', $facility->id], 'method' => 'POST' ])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{-- {{Form::submit('Delete', ['class' => 'btn btn-danger'])}} --}}
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