@extends('layouts.master')

@section('content')
<div class="container-white container-small">

    <div class="row">
        <div class="small-12 medium-12 columns">
            <h1>Reset Wachtwoord</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <hr class="no-margin-top">
    <div class="row">
        <div class="small-12 medium-12 columns">

            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Adres</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required pattern="email">
                        <span class="error">Verplicht veld, geef een geldig E-mail adres!</span>
                        @if ($errors->has('email'))
                            <span>{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div>
                    <button type="submit" class="button primary">Reset Wachtwoord</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
