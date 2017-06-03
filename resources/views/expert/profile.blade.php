@extends('layouts.app')

@section('styles')
    <style>
        iframe, object, embed {
            max-width: 100%;
        }

        .profile-pic-panel{
            margin-right: 10px;
        }

        .service-title-header{
            margin-top: 2px;
        }

        .set-meeting-button-instruction{
            color: #858585;
            padding: 3px;
            font-size:13px;
        }
    </style>
@endsection

@section('content')
    <!-- <img class="img-rounded" src="http://placehold.it/180X180"> -->

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        {{--profile pic and expert info--}}
                        <div class="panel panel-default profile-pic-panel">
                            <div class="panel-body text-center">
                                <div class="row">
                                    <img class="img-rounded" src="{{$expert->profile_picture_url}}">
                                    <div class="expert-name">{{$expert->user->name}}</div>
                                    <div class="expert-title"><p>{{$expert->current_occupation}}</p></div>
                                    <button class="btn btn-expert"
                                            ng-click="setMeetingClicked({{$expert->id}})">Set Meeting
                                        Tk.{{$expert->cost_per_minute}}/minute
                                    </button>
                                    <p class="set-meeting-button-instruction">If you set a meeting, expert will talk to you now</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    {{--expert bio & video--}}
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{$expert->bio}}</p>
                                        @if($expert->youtube_video_id)
                                            <div class="row text-center">
                                                <div>
                                                    <iframe width="640" height="360"
                                                            src="https://www.youtube.com/embed/{{$expert->youtube_video_id}}"
                                                            frameborder="0" allowfullscreen>
                                                    </iframe>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                        <span class="label label-default">{{$tag->name}}</span>
                                                    @endforeach
                                                </div>
                                                <div class="col-md-3 service-right-section text-center">
                                                    <button class="btn  get-service" data-toggle="modal" data-target="#myModal"
                                                            onClick="setGlobalExpert({{$service->expert->id}}, {{$service->expert->cost_per_minute}})">Set a Meeting
                                                    </button>
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
