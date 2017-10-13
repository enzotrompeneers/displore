<!-- Login -->
<div class="contact-panel" id="contact-panel" data-toggler=".is-active">

    <li><a id="login_dropdown_btn" class="contact-panel-button" data-toggle="contact-panel">Login</a></li>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Adres</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div><br>

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
            <div class="col-md-8 col-md-offset-4">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Onthoud me
                </label>
                <a type="submit" class="big_btn login_btn">Inloggen</a>
                <a class="big_btn facebook_btn">Inloggen met facebook</a>
                <a class="btn btn-link" href="{{ route('password.request') }}">Wachtwoord vergeten?</a><br>
                <a class="btn btn-link" href="{{ route('register') }}">Nog niet geregistreerd?</a><br><br>
            </div>
        </div>
            
    </form>
</div>
