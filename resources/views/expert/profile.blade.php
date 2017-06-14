@extends('layouts.app')

@section('styles')
    <style>

    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2 col-md-offset-2">
                <img class="img-rounded pull-right img-responsive" src="{{$expert->profile_picture_url}}" style="width: 100%">

            </div>
            <div class="col-md-6">
                <div class="expert-name">{{$expert->user->name}}</div>
                <div class="expert-title"><p>{{$expert->current_occupation}}</p></div>


                <p>{{$expert->bio}}</p>
                <button class="btn btn-expert" style="margin-bottom: 20px"
                        ng-click="setMeetingClicked({{$expert->id}})">Set Meeting
                    Tk.{{$expert->cost_per_minute}}/minute
                </button>
            </div>

        </div>


    </div>

    <div class="row">
        @if($expert->youtube_video_id)
            <div class="text-center">
                <div class="video-container">
                    <iframe width="640" height="360" src="https://www.youtube.com/embed/{{$expert->youtube_video_id}}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="row">



                    {{--area of expertise--}}
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Expertise</h2>
                            <div>
                                @foreach($expert->services as $service)

                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">

                                                <div class="col-md-9">
                                                    <h3 class="service-title-header">{{$service->title}}</h3>
                                                    <p>{{$service->description}}</p>

                                                    @foreach($service->tags as $tag)
                                                        <a href="{{$tag->service_url}}"><span class="label label-default">{{$tag->name}}</span></a>
                                                    @endforeach
                                                </div>
                                                <div class="col-md-3 service-right-section text-center">
                                                    <button class="btn btn-expert btn-service" ng-click="setMeetingClicked({{$expert->id}})" style="margin-top: 10px !important">Set a Meeting</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
