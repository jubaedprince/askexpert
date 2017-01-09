@extends('layouts.app')

@section('styles')



@endsection
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($services as $service)
                @include('service.single_service_card', ['service'=>$service])
            @endforeach
        </div>
    </div>
@endsection
