<div class="expert">
    <!-- <img class="img-rounded" src="http://placehold.it/180X180"> -->
    <a href="/{{$expert->slug}}"><img class="img-rounded" src="{{$expert->profile_picture_url}}"></a>
    <a href="/{{$expert->slug}}">
        <div class="expert-name">{{$expert->user->name}}</div>
    </a>
    <a href="/{{$expert->slug}}"><div class="expert-title"><p>{{str_limit($expert->current_occupation, 60)}}</p></div></a>
    <a href="/{{$expert->slug}}"><div class="expert-caption">
        <p>
            {{str_limit($expert->bio, 350)}}
        </p>
    </div> </a>
    {{--<button class="btn btn-expert" data-toggle="modal" data-target="#myModal" onClick="setGlobalExpert({{$expert->id}}, {{$expert->cost_per_minute}})">Set Meeting Tk.{{$expert->cost_per_minute}}/minute</button>--}}
    <button class="btn btn-expert" ng-click="setMeetingClicked({{$expert->id}})">Set Meeting Tk.{{$expert->cost_per_minute}}/minute</button>
</div>
