<div class="expert">
    <!-- <img class="img-rounded" src="http://placehold.it/180X180"> -->
    <img class="img-rounded" src="{{$expert->profile_picture_url}}">
    <a href="/{{$expert->slug}}">
        <div class="expert-name">{{$expert->user->name}}</div>
    </a>
    <div class="expert-title"><p>CEO, Techynaf</p></div>
    <div class="expert-caption">
        <p>
            {{$expert->bio}}
        </p>
    </div>
    <button class="btn btn-expert" data-toggle="modal" data-target="#myModal" onClick="setGlobalExpert({{$expert->id}})">Set Meeting Tk.{{$expert->cost_per_minute}}/minute</button>
</div>

<script>
    var EXPERT_ID;
    function setGlobalExpert(expert_id){
        EXPERT_ID = expert_id;
    }
</script>