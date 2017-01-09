@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Experts</a></li>
                <li><a data-toggle="tab" href="#menu1">Area of Expertise</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    @if(count($experts)==0)
                        <p>Sorry no expert found.</p>
                    @else
                        @foreach($experts as $expert)
                            <div class="text-center">
                                @include('expert.single_expert_card')
                            </div>

                        @endforeach
                    @endif
                </div>
                <div id="menu1" class="tab-pane fade">
                    @if(count($services)==0)
                        <p>Sorry no area of expertise found.</p>
                    @else
                        @foreach($services as $service)
                            @include('service.single_service_card', ['service'=>$service, 'disable_set_meeting' => false])
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
