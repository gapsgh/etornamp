@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-sm-9 col-md-7 login-box">
                <div class="panel panel-default">
                    <div class="panel-intro text-center">
                        <h2 class="logo-title">
                            
                            <span class="logo-icon">
                                <img src="{{url('assets/ico/logot.png')}}">
                            </span>
                        </h2>
                    </div>

                    <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"> <i style="width:20px;" class="fa fa-user" aria-hidden="true"></i></span>
                                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                </div>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                            <div class="input-group">
                                    <span class="input-group-addon"> <i style="width:20px;" class="fa fa-phone" aria-hidden="true"></i></span>
                                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required >
                                </div>

                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                            <div class="input-group">
                                    <span class="input-group-addon"> <i style="width:20px;" class="fa fa-key" aria-hidden="true"></i></span>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"> <i style="width:20px;" class="fa fa-key" aria-hidden="true"></i></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="Submitbutton" type="submit" class="btn btn-primary">
                                  <i class="icon-user-add"></i>  Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                    <div class="panel-footer">
                        <p class="text-center "><a href="{{url('/')}}"> Back to Website </a></p>
                        <div style=" clear:both"></div>
                    </div>
                </div>
                <div class="login-box-btm text-center">
                    <p> Already have an account? <br>
                    <a href="{{url('/login')}}"><strong>Login!</strong> </a></p>
                </div>
                </div>
            </div>
</div>
@endsection
