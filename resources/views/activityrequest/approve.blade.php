@extends("layouts.app")

@section('content')
<div class="container mt-5 mb-5">
    <div class="row mr-0 ml-0">
        <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
    </div>
    <h4 class="mt-3 mb-3">Approve Activity Request</h4>
    <iframe src="https://calendar.google.com/calendar/b/2/embed?height=600&amp;wkst=1&amp;bgcolor=%23D50000&amp;ctz=Asia%2FManila&amp;src=YzFiZXRkYTdkaTVxdXJtcjRzdWE1MXZyNzRAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZW4ucGhpbGlwcGluZXMjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23795548&amp;color=%230B8043" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe><script type="text/javascript" src="js/custom.js"></script>
    <br>
    <br>
    <div class="card">
        <h5 class="card-header">{{$title}}</h5>
        <div class="card-body">
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
                                    <td><a href="/activityrequest/{{$activity_request->id}}">{{$activity_request->activity_name}}</a></td>
                                    <td><small>{{$activity_request->date_from}} - {{$activity_request->date_to}}
                                            <br>{{$activity_request->time_from}} - {{$activity_request->time_to}}
                                    </small></td>
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
                                        @if($activity_request->request_status == 'pending')
                                            <div class="btn-group" role="group">
                                                @if($activity_request->schedule_status == 'approved')
                                                    {!!Form::open(['action' => ['ActivityRequestsController@approve_update', $activity_request->id], 'method' => 'POST' ])!!}
                                                        {{Form::hidden('_method', 'PUT')}}
                                                        {{ Form::button('<i class="fa fa-check"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}
                                                    {!!Form::close()!!}
                                                    {!!Form::open(['action' => ['ActivityRequestsController@decline_update', $activity_request->id], 'method' => 'POST' ])!!}
                                                        {{Form::hidden('_method', 'PUT')}}
                                                        {{ Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                                                    {!!Form::close()!!}
                                                @else
                                                    {!!Form::open(['action' => ['ActivityRequestsController@approve_update', $activity_request->id], 'method' => 'POST' ])!!}
                                                        {{Form::hidden('_method', 'PUT')}}
                                                        {{ Form::button('<i class="fa fa-check"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm', 'disabled'] )  }}
                                                    {!!Form::close()!!}
                                                    {!!Form::open(['action' => ['ActivityRequestsController@decline_update', $activity_request->id], 'method' => 'POST' ])!!}
                                                        {{Form::hidden('_method', 'PUT')}}
                                                        {{ Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'disabled'] )  }}
                                                    {!!Form::close()!!}
                                                @endif
                                            </div>
                                        @elseif($activity_request->request_status == 'approved')
                                            <a href="/"><button class="btn btn-dark btn-sm mr-1"><i class="fa fa-print"></i></button></a>
                                        @else 
                                            <p><small>Remarks: {{$activity_request->request_remarks}}</small></p>
                                        @endif
                                    </div></td>
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
</body>
@endsection