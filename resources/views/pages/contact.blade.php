@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <div class="well  well-contact">
                    <h2>askexpert.co</h2>
                    {{--<p>expert advice, on anything!</p>--}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 ">
                <div class="well  well-contact">
                    <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                    <h4>Address</h4>
                    <p>House-4, Road-12, Sector-11, Uttara, Dhaka-1230, Bangladesh</p>
                </div>

                <div class="well  well-contact">
                    <i class="fa fa-mobile fa-2x" aria-hidden="true"></i>
                    <h4>Mobile</h4>
                    <p>880 1707 564 414</p>
                </div>
                <div class="well  well-contact">
                    <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                    <h4>Email</h4>
                    <p>hello@askexpert.co</p>
                </div>
            </div>
            <div class="col-md-6">

                <div class="well  well-contact">
                    <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                    <h4>Facebook</h4>
                    <p><a href="https://www.facebook.com/AskExpert.Co/" target="_blank">Like Us</a></p>
                </div>

                <div class="well  well-contact">
                    <i class="fa fa-youtube fa-2x" aria-hidden="true"></i>
                    <h4>Youtube</h4>
                    <p><a href="https://www.youtube.com/channel/UC-yRKpvmz7vhSyU3vR8TPEg" target="_blank">Subscribe Us</a></p>
                </div>
                <div class="well  well-contact">
                    <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                    <h4>Instagram</h4>
                    <p><a href="https://www.instagram.com/askexpert_co/" target="_blank">Follow Us</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection