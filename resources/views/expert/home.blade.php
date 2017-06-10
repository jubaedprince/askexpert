@extends('layouts.app')

@section('styles')
    <link href="/external-libraries/croppie/croppie.css" rel="stylesheet">
    <style>
        #upload-demo{
            height: 250px;
            width: 250px;
        }
    </style>


@endsection

@section('scripts')
    <script src="/external-libraries/croppie/croppie.js"></script>


    <script>


            var $uploadCrop;

            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.upload-demo').addClass('ready');
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        }).then(function(){
                            console.log('jQuery bind complete');
                        });

                    }

                    reader.readAsDataURL(input.files[0]);
                }
                else {
                    console.log("Sorry - you're browser doesn't support the FileReader API");
                }
            }

            $uploadCrop = $('#upload-demo').croppie({
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'circle'
                },
                enableExif: true
            });

            $('#upload').on('change', function () { readFile(this); });
            $('.upload-result').on('click', function (ev) {
                $uploadCrop.croppie('result', {
                    type: 'blob',
                    size: 'viewport'
                }).then(function (resp) {
//                    console.log(resp);

                    var formData = new FormData();
                    formData.append('image', resp);
                    formData.append('_method', 'PUT');
                    formData.append('_token',  $('meta[name="csrf-token"]').attr('content'));

                    $.ajax({
                        url : "/expert/{{$user->expert->id}}/profile-picture",
                        type: "POST",
                        data : formData,
                        contentType: false,
                        processData: false,
                        success: function(data, textStatus, jqXHR)
                        {
                            location.reload();
//                            $('#expert-profile-picture').attr('src', data.profile_picture_url );
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            console.log(errorThrown);
                        }
                    });
                });
            });

    </script>
@endsection
@section('content')

<div class="container">
    @if($user->isActiveExpert())
        <div class="row">
            <div class=" col-md-8 col-md-offset-2 alert alert-info" role="alert">
              <strong>Active</strong>
            </div>
        </div>
    @else
        <div class="row">
            <div class=" col-md-8 col-md-offset-2 alert alert-info" role="alert">
              <strong>Not Active</strong>
            </div>
        </div>
    @endif

    @if($user->isPendingExpert())
        <div class="row">
            <div class=" col-md-8 col-md-offset-2 alert alert-info" role="alert">
              <strong>Verfication Pending!</strong>  We have received your application. We are verifying and will let you know.
            </div>
        </div>
    @endif

    @if($user->isApprovedExpert())
        <div class="row">
            <div class=" col-md-8 col-md-offset-2 alert alert-info" role="alert">
              <strong>Congratulations!</strong>  We have reviewed your application. You are approved.
            </div>
        </div>


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Expertise</div>

                    <div class="panel-body">
                        Please add a expertise
                        <a href="/service/create" class="btn btn-default">Add Expertise</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

     @if($user->isDeclinedExpert())
        <div class="row">
            <div class=" col-md-8 col-md-offset-2 alert alert-info" role="alert">
              <strong>Sorry!</strong>  We have reviewed your application. You are not approved. Please contact us if you think there was a problem.
            </div>
        </div>
    @endif


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <img id="expert-profile-picture" class="img-circle" width="100px" src="{{$user->expert->profile_picture_url}}">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                        Change Profile Picture
                    </button>

                    <!-- Button trigger modal -->
                    <a href="/expert/{{\Illuminate\Support\Facades\Auth::user()->expert->id}}/edit" class="btn btn-primary btn-sm">
                        Edit Profile
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Approved Expertise</div>
                <div class="panel-body">
                    @if(count($approved_services)===0)
                        <p>No approved expertise yet.</p>
                    @endif
                    @foreach($approved_services as $service)
                        @include('service.single_service_card', ['service'=>$service,  'disable_set_meeting' => true])
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pending Expertise</div>
                <div class="panel-body">
                    @if(count($pending_services)===0)
                        <p>No pending expertise yet, add a expertise</p>
                    @endif
                    @foreach($pending_services as $service)
                        @include('service.single_service_card', ['service'=>$service, 'disable_set_meeting' => true])
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Change Profile Picture</h4>
            </div>
            <div class="modal-body">

                <div>
                    <div class="actions">
                        {{--<a class="btn file-btn">--}}
                            <input type="file" id="upload" value="Choose a file" accept="image/*"/>
                        {{--</a>--}}
                    </div>
                </div>

                <div class="upload-demo-wrap">
                    <div id="upload-demo"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button  class="upload-result btn btn-primary" type="button" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
