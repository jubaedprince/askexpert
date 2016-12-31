@extends('layouts.app')

@section('styles')
    <style>
        .expert{
            border: 1px solid rgba(182, 143, 251, 0.42);
            border-radius: 6px;
        }
    </style>
@endsection
@section('content')
    <section>
        <div>
            <div class="container">
                <div class="row text-center">
                    <h1>Our Experts</h1>
                    <p>Experts make your life easy. They can help anyway necessary.</p>
                    <div class="row">
                        <div class="outer">

                            @foreach($experts as $expert)

                                @include('expert.single_expert_card')

                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
