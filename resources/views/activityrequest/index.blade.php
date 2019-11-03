@extends("layouts.app")

@section('content')

<div class="container mt-5 mb-5">
    <div class="row mr-0 ml-0">
        <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
        <a href="/createrequest"><button class="btn btn-success btn-sm mr-1"><i class="fa fa-plus"></i> Create Activity Request</button></a>
        <a href="/approverequests"><button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Approve Request</button></a>
    </div>
    <br>
    <h5 class="">{{$title}}</h5>
        <div class="col col-lg-12 col-md-6">
            <table class="table table-responsive-md">
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><center>No.</center></th>
                        <th scope="col"><center>Activity Name</center></th>
                        <th scope="col"><center>Activity Date</center></th>
                        <th scope="col"><center>Venue</center></th>
                        <th scope="col"><center>Category</center></th>
                        <th scope="col"><center>Status</center></th>
                        <th scope="col"><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if( count($activity_requests) > 0)
                        @foreach ($activity_requests as $activity_request)
                            <tr align="center">  
                                <td>{{$activity_request->id}}</td>
                                <td>{{$activity_request->activity_name}}</td>
                                <td>{{$activity_request->date_from}} - {{$activity_request->date_to}}</td>
                                <td>{{$activity_request->facility_name}} ({{$activity_request->schedule_status}})</td>
                                <td>{{$activity_request->activity_category}}</td>
                                <td>@if($activity_request->request_status == 'pending')
                                        <i class="fa fa-exclamation-circle icon-pending"></i>
                                    @elseif($activity_request->request_status == 'approved')
                                        <i class="fa fa-check-circle icon-success" ></i>
                                    @else
                                        <i class="fa fa-times-circle icon-danger"></i>
                                    @endif
                                </td>
                                <td><div class="btn-group" role="group">
                                        <a href="/activityrequest/{{$activity_request->id}}">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                                        </a>
                                    @if($activity_request->request_status == 'pending')
                                        {!!Form::open(['action' => ['ActivityRequestsController@destroy', $activity_request->id], 'method' => 'POST' ])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                                        {!!Form::close()!!}
                                    @endif
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
@endsection