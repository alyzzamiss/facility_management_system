@extends("layouts.app")

@section('content')

<div class="container mt-5 mb-5">
    <div class="row mr-0 ml-0">
        <a href="javascript:history.go(-1)" class="mr-auto"><button class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back</button></a>
        <a href="/createrequest"><button class="btn btn-success btn-sm mr-1"><i class="fa fa-plus"></i> Create Activity Request</button></a>
        <a href="/approverequest"><button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Approve Request</button></a>
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
                                    <td>{{$facility_schedule->schedule_status}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/showrequest"><button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a>
                                            <a href="edit.php"><button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button></a>
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