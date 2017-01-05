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
                @include('service.single_service_card', ['service'=>$service, 'disable_set_meeting' => true])
        </div>
    </div>
@endsection
