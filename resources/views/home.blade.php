@extends('layouts.app')

@section('content')
   <div class="container mt-5">
        <h3>Facilities Management System</h3>
        <div class="card">
            <div class="card-head mt-2 ml-3">
                <h5>App Modules</h5>
            </div>
            <div class="card-body">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-lg-2">
                            <a href="activityrequest/index.php">
                                <button class="btn btn-outline-danger"><i class="fa fa-edit"></i><br>Activity Request</button>
                            </a>
                        </div>                                                         
                        <div class="col-lg-2">
                            <a href="facilityschedule/index2.php">
                                <button class="btn btn-outline-danger"><i class="fa fa-building"></i><br>Facility Request</button>
                            </a>
                        </div>
                        <div class="col-lg-2">
                            <a href="/vehiclerequest">
                                <button class="btn btn-outline-danger"><i class="fa fa-car"></i><br>Vehicle Request</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>           
       </div>
   </div>
@endsection