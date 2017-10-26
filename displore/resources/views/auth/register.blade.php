@extends('layouts.master')

@section('content')
<div class="row">
    
    <div class="panel-body">
    <div class="small-12 columns">
        <h1>Registreren</h1>
    </div>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}" data-abide novalidate>
            {{ csrf_field() }}

            <div class="small-12 columns">
              <label>Voornaam <small>Verplicht</small>
                <input type="text" placeholder="Voornaam" required pattern="alpha" name="first_name">
                <small class="error">Voornaam is verplicht, enkel letters!</small>
              </label>
            </div>

            <div class="small-12 columns">
              <label>Achternaam <small>Verplicht</small>
                <input type="text" placeholder="Achternaam" required pattern="alpha" name="last_name">
                <small class="error">Achternaam is verplicht, enkel letters!</small>
              </label>
            </div>

            <div class="small-12 columns">
              <label>E-mail <small>Verplicht</small>
                <input type="text" placeholder="Voornaam@mail.com" required pattern="email" name="email">
                <small class="error"> Email is verplicht, geef een geldig E-mail adres!</small>
              </label>
            </div>

            <div class="small-6 columns">
              <label>Wachtwoord <small>Verplicht</small>
                <input type="password" id="password" placeholder="Wachtwoord" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" name="password">
                <small class="error">Wachtwoord is verplicht <br>Minimaal 6 karakters, Minstens 1 letter en 1 nummer!</small>
              </label>
            </div>

            <div class="small-6 columns">
              <label>Bevestig Wachtwoord <small>Verplicht</small>
                <input type="password" placeholder="Herhaal Wachtwoord" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" name="password_confirmation" data-equalto="password">
                <small class="error">Wachtwoord komt niet overeen.</small>
              </label>
            </div>

            <div class="small-12 columns">
                <button type="submit" class="button primary">
                    Registreren
                </button>
            </div>
        
        </form>
    </div>
</div>
@endsection

