<div class="panel panel-default service-card">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <img class="img-responsive" src="{{$service->expert->profile_picture_url}}">
            </div>
            <div class="col-md-7">
                <h3>{{$service->title}}</h3>
                <p class="expert-info"><a href="/{{$service->expert->slug}}">{{$service->expert->user->name}}</a>, {{$service->expert->current_occupation}}</p>

                <p>{{$service->description}}</p>
                @foreach($service->tags as $tag)
                    <a href="{{$tag->service_url}}"><span class="label label-default">{{$tag->name}}</span></a>
                @endforeach
            </div>
            <div class="col-md-2 service-right-section text-center">
                <h3 class="service-rate">Tk. {{$service->expert->cost_per_minute}}</h3>
                <p class="per-minute">per minute</p>
                @unless($disable_set_meeting)
                    <button class="btn btn-expert btn-service" ng-click="setMeetingClicked({{$service->expert->id}})">Book a Meeting</button>

                    {{--<button class="btn btn-expert" ng-click="setMeetingClicked({{$expert->id}})">Set Meeting Tk.{{$expert->cost_per_minute}}/minute</button>--}}
                @endunless
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