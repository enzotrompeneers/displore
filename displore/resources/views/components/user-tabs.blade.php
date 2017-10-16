<div>
	<div>
		<ul>
			<li><a href="{{ route('user.offers') }}" class="tab">Jouw aanbiedingen</a></li>
			<li><a href="{{ route('user.reservations') }}" class="tab">Reservaties</a></li>
			<li><a href="{{ route('user.profile') }}" class="tab">Profiel</a></li>
			<li><a href="{{ route('user.password') }}" class="tab">Wachtwoord veranderen</a></li>
		</ul>
	</div>

	<div class="tab-content">
		{{ $slot }}
	</div>
</div>