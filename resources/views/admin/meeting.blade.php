@extends('admin.layouts.admin-layout')

@section('admin-content')

<!-- Pending Expert -->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Pending Experts</div>
            <div class="panel-body"> 
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Preferable Date</th>
                    <th>Preferable Time</th>
                    <th>Expert</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($meeting_requests as $meeting)
                    <tr>
                        <td>{{$meeting->requestor_name}}</td>
                        <td>{{$meeting->requestor_phone_number}}</td>
                        <td>{{$meeting->preferable_date}}</td>
                        <td>{{$meeting->preferable_time}}</td>
                        <td>{{$meeting->expert->user->name}}</td>
                        <td><a href="{{url('/admin/meeting/' . $meeting->id)}}" class="btn btn-default btn-xs">View</a></td>
                        {{--<td>{{date('F d, Y', strtotime($pending_expert->created_at)) }}</td>--}}
                        {{--<td>--}}
                            {{--<form action="{{ url('/expert/' . $pending_expert->user->id ) }}" method="POST">--}}
                                {{--<input type="hidden" name="status" value="approved">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<button type="submit" class="btn btn-success btn-xs">Approve</button>--}}
                            {{--</form>--}}

                            {{--<form action="{{ url('/expert/' . $pending_expert->user->id ) }}" method="POST">--}}
                                {{--<input type="hidden" name="status" value="declined">--}}
                                {{--{{ csrf_field() }}--}}

                                {{--<button type="submit" class="btn btn-danger btn-xs">Decline</button>--}}
                            {{--</form>   --}}
                        {{--</td>--}}
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
        </div>
    </div>

        </div>
    </div>   
</div>
@endsection
