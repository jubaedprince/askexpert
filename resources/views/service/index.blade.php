@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(count($services)>0)
                @foreach($services as $service)
                    @include('service.single_service_card', ['service'=>$service])
                @endforeach
            @else
                <h1>We didn't find any expert yet for this category. If you know anyone, please let us know. <a href="/contact">Contact Us </a></h1>
            @endif
        </div>
    </div>


@endsection
