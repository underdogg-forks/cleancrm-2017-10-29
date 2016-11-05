@extends('layouts.master')

@section('title', 'Change Password')

@section('content')

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/change') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-refresh"></i> Change Password
                    </button>
                </div>
            </div>
        </form>

@endsection