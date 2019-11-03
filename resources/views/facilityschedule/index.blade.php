@extends("layouts.app")

@section('content')

<div class="container mt-5 mb-5">
    <div class="row mr-0 ml-0">
        <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
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
                        <th scope="col"><center>Venue</center></th>
                        <th scope="col"><center>Activity Name</center></th>
                        <th scope="col"><center>Activity Date</center></th>
                        <th scope="col"><center>Status</center></th>
                        <th scope="col"><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                         @if( count($facility_schedules) > 0)
                            @foreach ($facility_schedules as $facility_schedule)
                                <tr align="center">  
                                    <td>{{$facility_schedule->id}}</td>
                                    <td>{{$facility_schedule->facility_name}}</td>
                                    <td>{{$facility_schedule->activity_name}}</td>
                                    <td>{{$facility_schedule->date_from}} - {{$facility_schedule->date_to}}</td>
                                    <td>@if($facility_schedule->schedule_status == 'pending')
                                            <i class="fa fa-exclamation-circle icon-pending"></i>
                                        @elseif($facility_schedule->schedule_status == 'approved')
                                            <i class="fa fa-check-circle icon-success" ></i>
                                        @else
                                            <i class="fa fa-times-circle icon-danger"></i>
                                        @endif</td>
                                    <td>
                                        @if($facility_schedule->schedule_status == 'pending')
                                            <div class="btn-group" role="group">
                                                {!!Form::open(['action' => ['FacilitySchedulesController@approve_update', $facility_schedule->id], 'method' => 'POST' ])!!}
                                                    {{Form::hidden('_method', 'PUT')}}
                                                    {{ Form::button('<i class="fa fa-check"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}
                                                {!!Form::close()!!}
                                                {!!Form::open(['action' => ['FacilitySchedulesController@decline_update', $facility_schedule->id], 'method' => 'POST' ])!!}
                                                    {{Form::hidden('_method', 'PUT')}}
                                                    {{ Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                                                {!!Form::close()!!}
                                            </div>
                                        @elseif($facility_schedule->schedule_status == 'approved')
                                            <a href="/"><button class="btn btn-dark btn-sm mr-1"><i class="fa fa-print"></i></button></a>
                                        @else
                                            <p><small>Remarks:{{$facility_schedule->schedule_remarks}}</small></p>
                                        @endif  
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