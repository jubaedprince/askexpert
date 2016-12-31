@extends('layouts.app')

@section('styles')

    <style>

        .service-card{


        }

        .service-card .expert-info{
            color: #ababab;
            font-size: 16px;
        }

        .label-default {
            background-color: #72b8bf;
        }

        .label{
            font-size: 100%;
            margin-right: 0.3em;
        }

        .service-right-section{
            padding-top: 3%;
        }
        .get-service{
            color: white;
            font-weight: 800;
            background-color: #F47252;
        }

        .service-rate{
            font-weight: 800;
        }
        .per-minute{
            margin-top: -10px;
        }
    </style>

@endsection
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($services as $service)
                <div class="panel panel-default service-card">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-responsive" src="{{$service->expert->profile_picture_url}}">
                            </div>
                            <div class="col-md-7">
                                <h3>{{$service->title}}</h3>
                                <p class="expert-info">{{$service->expert->user->name}}, {{$service->expert->current_occupation}}</p>

                                <p>{{$service->description}}</p>
                                @foreach($service->tags as $tag)
                                    <span class="label label-default">{{$tag->name}}</span>
                                @endforeach
                            </div>
                            <div class="col-md-2 service-right-section text-center">
                                <h3 class="service-rate">Tk. {{$service->expert->cost_per_minute}}</h3>
                                <p class="per-minute">per minute</p>
                                <button class="btn btn-default get-service">Set a Meeting</button>
                            </div>
                        </div>

                    </div>
                </div>

                {{--<div class="panel panel-default service-card">--}}
                    {{--<div class="panel-body">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--<img class="img-responsive" src="{{$service->expert->profile_picture_url}}">--}}
                            {{--</div>--}}
                            {{--<div class="col-md-7">--}}
                                {{--<h3>Building leadership skills with self development</h3>--}}
                                {{--<p class="expert-info">Mustahsin Islam, CEO, iEARN-BD</p>--}}

                                {{--<p>I am focused on providing bla bla this is very important. I am focused on providing bla bla this is very important I am focused on providing bla bla this is very important I am focused on providing bla bla this is very important</p>--}}
                                {{--@foreach($service->tags as $tag)--}}
                                    {{--<span class="label label-default">{{$tag->name}}</span>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                            {{--<div class="col-md-2 service-right-section text-center">--}}
                                {{--<h3 class="service-rate">Tk. 50</h3>--}}
                                {{--<p class="per-minute">per minute</p>--}}
                                {{--<button class="btn btn-default get-service">Set a Meeting</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}


            @endforeach
        </div>
    </div>
@endsection
