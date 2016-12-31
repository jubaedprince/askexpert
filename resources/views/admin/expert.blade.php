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
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($pending_experts as $pending_expert)
                    <tr>
                        <td>{{$pending_expert->user->name}}</td>
                        <td>{{$pending_expert->user->email}}</td>
                        <td>{{$pending_expert->mobile}}</td>
                        <td>{{date('F d, Y', strtotime($pending_expert->created_at)) }}</td>
                        <td>
                            <form action="{{ url('/expert/' . $pending_expert->user->id ) }}" method="POST">
                                <input type="hidden" name="status" value="approved">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success btn-xs">Approve</button>
                            </form>

                            <form action="{{ url('/expert/' . $pending_expert->user->id ) }}" method="POST">
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


    <!-- Approved Expert -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Approved Experts</div>
                <div class="panel-body"> 
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Calls</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($approved_experts as $approved_expert)
                        <tr>
                            <td>{{$approved_expert->user->name}}</td>
                            <td>{{$approved_expert->user->email}}</td>
                            <td>{{$approved_expert->mobile}}</td>
                            <td>{{$approved_expert->number_of_complete_calls}}
                                @include('admin.forms.increment_number_of_complete_calls', ['expert' => $approved_expert])
                                @include('admin.forms.decrement_number_of_complete_calls', ['expert' => $approved_expert])
                            </td>
                            <td>{{date('F d, Y', strtotime($approved_expert->created_at)) }}</td>
                            <td>
                            
                                <form action="{{ url('/expert/' . $approved_expert->user->id ) }}" method="POST">
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

        <!-- Declined Expert -->
         <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Declined Experts</div>
                    <div class="panel-body"> 
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($declined_experts as $declined_expert)
                            <tr>
                                <td>{{$declined_expert->user->name}}</td>
                                <td>{{$declined_expert->user->email}}</td>
                                <td>{{$declined_expert->mobile}}</td>
                                <td>{{date('F d, Y', strtotime($declined_expert->created_at)) }}</td>
                                <td>
                                    <form action="{{ url('/expert/' . $declined_expert->user->id ) }}" method="POST">
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
    </div>   
</div>
@endsection
