@extends('layouts.app')

@section('content')


        <!-- <img class="img-rounded" src="http://placehold.it/180X180"> -->

    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <img class="img-rounded" src="{{$expert->profile_picture_url}}">
            <div class="expert-name">{{$expert->user->name}}</div>
            <div class="expert-title"><p>CEO, Techynaf</p></div>
            <div class="col-md-8 col-md-offset-2  expert-caption">
                <p>
                    Expedia. Freshbooks. Dozens of other companies, large and small. Helping founders, partners, owner-operators, companies and teams get to the next level is my great love and where I have the most fun.
                </p>
            </div>
            <button class="btn btn-expert">Set Meeting Tk.{{$expert->cost_per_hour}}/hour</button>
            <p>If you set a meeting, expert will talk to you now</p>

        </div>
    </div>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($expert->services as $service)
                <div class="panel panel-default service-card">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Building leadership skills with self development</h3>

                                <p>I am focused on providing bla bla this is very important. I am focused on providing bla bla this is very important I am focused on providing bla bla this is very important I am focused on providing bla bla this is very important</p>
                                @foreach($service->tags as $tag)
                                    <span class="label label-default">{{$tag->name}}</span>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if($expert->youtube_video_id)
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <iframe width="640" height="360"
                        src="https://www.youtube.com/embed/{{$expert->youtube_video_id}}" frameborder="0" allowfullscreen>
                </iframe>
            </div>
        </div>
    @endif
@endsection
