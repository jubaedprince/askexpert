@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class=" col-md-8 col-md-offset-2 alert alert-info" role="alert">
          <strong>Welcome Admin!</strong>  Be reasonable, sensible and make it a great product.
        </div>
    </div>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <a href="/home" class="btn btn-success">Home</a>
            <a href="/admin/expert" class="btn btn-success">Expert Mangement</a>
            <a href="/admin/service" class="btn btn-success">Service Mangement</a>
            <a href="/admin/meeting" class="btn btn-success">Meeting Mangement</a>
        </div>
    </div>

    @yield('admin-content')
</div>
@endsection
