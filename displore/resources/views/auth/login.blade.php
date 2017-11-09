@extends('layouts.master')

@section('content')
<div class="container-white container-small">
    
    <div class="row">
        <div class="small-12 medium-12 columns">
            <h1>Inloggen</h1>
        </div>
    </div>

    <hr class="no-margin-top">
        
    <div class="row">
        <div class="small-12 medium-12 columns">
            
            
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span> {{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Wachtwoord</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span> {{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>


                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Onthoud me
                    </label>
                </div>

                <div>
                    <button type="submit" class="button primary">Login</button>
                    <a class="red_ghost" href="{{ route('register') }}">Nog niet geregistreerd?</a>
                </div>

                <br />
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Wachtwoord vergeten?
                </a>

            </form>
        </div>
    </div>
</div>
@endsection


