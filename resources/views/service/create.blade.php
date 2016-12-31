@extends('layouts.app')

@section('styles')
    <link href="/external-libraries/select2/css/select2.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="/external-libraries/select2/js/select2.js"></script>
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Service</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/service') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group{{ $errors->has('cost_per_hour') ? ' has-error' : '' }}">--}}
                            {{--<label for="cost_per_hour" class="col-md-4 control-label">Cost Per Hour</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="cost_per_hour" type="text" class="form-control" name="cost_per_hour" value="{{ old('cost_per_hour') }}" required autofocus>--}}

                                {{--@if ($errors->has('cost_per_hour'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('cost_per_hour') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                            <label for="tags" class="col-md-4 control-label">Tags</label>

                            <div class="col-md-6">
                                <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                                    @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('tags'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
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
