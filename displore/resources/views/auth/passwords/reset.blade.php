@extends('layouts.master')

@section('content')
<div class="container-white container-small">
    <div class="row">
        <div class="large-12 columns">
            <h1>Reset Wachtwoord</h1>
            <p>Stel opnieuw een wachtwoord in voor je E-mail adres.</p>
        </div>
    </div>

    <hr class="no-margin-top">
    <div class="row">
        <div class="large-12 columns">
            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}" data-abide novalidate>
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Adres</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required pattern="email">
                        <span class="error">Verplicht veld, geef een geldig E-mail adres!</span>
                        @if ($errors->has('email'))
                            <span>{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Nieuw Wachtwoord</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required pattern="^(?=.*[0-9])(?=.*[a-z]).{6,}$">
                        <span class="error">Verplicht veld, min. 6 karakters, minstens 1 letter en 1 nummer</span>
                        @if ($errors->has('password'))
                            <span>{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Bevestig Wachtwoord</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password-confirm" required pattern="^(?=.*[0-9])(?=.*[a-z]).{6,}$">
                        <span class="error">Verplicht veld, min. 6 karakters, minstens 1 letter en 1 nummer</span>
                        <span class="error">Wachtwoord is niet hetzelfde!</span>
                        @if ($errors->has('password_confirmation'))
                            <span>{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                </div>

                <div>
                    <button type="submit" class="button primary">Verander Wachtwoord</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
