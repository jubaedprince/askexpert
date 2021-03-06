@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/expert/'. $expert->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $expert->user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('current_occupation') ? ' has-error' : '' }}">
                            <label for="current_occupation" class="col-md-4 control-label">Current Occupation</label>

                            <div class="col-md-6">
                                <input id="current_occupation" type="text" class="form-control" name="current_occupation" value="{{ $expert->current_occupation }}" required autofocus>

                                @if ($errors->has('current_occupation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current_occupation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <label for="bio" class="col-md-4 control-label">Bio</label>

                            <div class="col-md-6">
                                <input id="bio" type="text" class="form-control" name="bio" value="{{ $expert->bio }}" required autofocus>

                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $expert->user->email }}" disabled >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $expert->mobile }}" required autofocus>

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cost_per_minute') ? ' has-error' : '' }}">
                            <label for="cost_per_minute" class="col-md-4 control-label">Cost Per Minute</label>

                            <div class="col-md-6">
                                <input id="cost_per_minute" type="text" class="form-control" name="cost_per_minute" value="{{ $expert->cost_per_minute }}" required autofocus>

                                @if ($errors->has('cost_per_minute'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cost_per_minute') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('youtube_video_url') ? ' has-error' : '' }}">
                            <label for="youtube_video_url" class="col-md-4 control-label">Youtube Video Url</label>

                            <div class="col-md-6">
                                <input id="youtube_video_url" type="text" class="form-control" name="youtube_video_url" value="{{ $expert->youtube_video_url }}" autofocus>

                                @if ($errors->has('youtube_video_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('youtube_video_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
