@extends('layouts.master')

@section('content')
<div class="row">
    <h1>Inloggen</h1>
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Wachtwoord</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Onthoud me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="button primary">
                        Login
                    </button>
                    <a class="red_ghost" href="{{ route('register') }}">Nog niet geregistreerd?</a>

                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Wachtwoord vergeten?
                    </a>
                </div>
                <!--
                <div class="col-md-4 col-md-offset-4">
                    <a class="button facebook_btn">Inloggen met facebook</a>
                </div>
                -->
            </div>
        </form>
    </div>
</div>
@endsection


