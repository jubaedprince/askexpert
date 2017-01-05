@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default service-card">
                <div class="panel-body">
                    <h2>Requestor</h2>
                    <p>Name: {{$meeting->requestor_name}}</p>
                    <p>Phone: {{$meeting->requestor_phone_number}}</p>

                    <h2>Time Preference</h2>
                    <p>Date: {{$meeting->preferable_date}}</p>
                    <p>Time: {{$meeting->preferable_time}}</p>
                    <p>Duration: {{$meeting->estimated_duration}}</p>

                    <h2>Discussion Topic</h2>
                    <p>{{$meeting->discussion_topics}}</p>

                    <h2>Other</h2>
                    <p>Status: {{$meeting->status}}</p>
                    <p>Note: {{$meeting->note}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
