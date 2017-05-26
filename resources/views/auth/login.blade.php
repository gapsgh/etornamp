@extends('layouts.app')

@section('content')
<div class="container">
       <div class="row">
            <div class="col-sm-7 col-md-5 login-box">
                <div class="panel panel-default">
                    <div class="panel-intro text-center">
                        <h2 class="logo-title">
                            
                            <span class="logo-icon">
                                <img src="{{url('assets/ico/logot.png')}}">
                            </span>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <label for="phone_number" class="control-label">Phone Number</label>
                                <div class="input-icon"><i style="width:25px;" class="fa fa-phone"></i>
                                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autofocus>
                                </div>
                            </div>
                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>
                                <div class="input-icon"> <i style="width:25px;" class="fa fa-key"></i>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>


                        <div class="form-group">
                            <div class="">
                                <button id="Submitbutton" type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="tel:0542414719">
                                    <i class="icon-mobile"></i> Forgot Your Password? Call
                                </a>
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
                    <p> Don't have an account? <br>
                    <a href="{{url('/register')}}"><strong>Register One!</strong> </a></p>
                </div>
                </div>
            </div>
</div>
@endsection
