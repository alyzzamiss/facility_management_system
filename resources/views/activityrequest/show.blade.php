@extends("layouts.app")

@section('content')
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{$activity_request->activity_name}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>   
                </div>
                <div class="modal-body">
                    <p>Request details</p>
                </div>
                <div class="modal-footer">
                    @if($activity_request->schedule_status == 'approved')                        
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Decline</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check-square-o"></i> Approve</button>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection