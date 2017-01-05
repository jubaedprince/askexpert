@extends('admin.layouts.admin-layout')

@section('admin-content')

<!-- Pending Service -->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Services waiting for approval</div>
            <div class="panel-body"> 
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Expert Name</th>
                    <th>Short Description</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($pending_services as $service)
                    <tr>
                        <td>{{$service->title}}</td>
                        <td>{{$service->expert->user->name}}</td>
                        <td>{{$service->short_description}}</td>
                        <td>{{date('F d, Y', strtotime($service->created_at)) }}</td>
                        <td>
                            <a href="{{url('/admin/service/' . $service->id)}}" class="btn btn-default btn-xs">View</a>
                            <form action="{{ url('admin/service/' . $service->id ) }}" method="POST">
                                <input type="hidden" name="status" value="approved">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success btn-xs">Approve</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
        </div>
    </div>  
        
    <!-- Approvoed Service -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Approved Services</div>
                <div class="panel-body"> 
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Expert Name</th>
                        <th>Short Description</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($approved_services as $service)
                        <tr>
                            <td>{{$service->title}}</td>
                            <td>{{$service->expert->user->name}}</td>
                            <td>{{$service->short_description}}</td>
                            <td>{{date('F d, Y', strtotime($service->created_at)) }}</td>
                            <td>
                                <a href="{{url('/admin/service/' . $service->id)}}" class="btn btn-default btn-xs">View</a>
                                <form action="{{ url('admin/service/' . $service->id ) }}" method="POST">
                                    <input type="hidden" name="status" value="declined">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-xs">Decline</button>
                                </form>
                            </td>
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


@endsection
