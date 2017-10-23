<div>
	<div>
		<ul>
			<li>
				<a href="{{ route('user.offers') }}" class="tab {{ trim($tab) === "offers" ? "tab-active" : "" }}">Jouw aanbiedingen</a>
			</li>
			<li>
				<a href="{{ route('user.reservations') }}" class="tab {{ trim($tab) === "reservations" ? "tab-active" : "" }}">Reservaties</a>
			</li>
			<li>
				<a href="{{ route('user.profile') }}" class="tab {{ trim($tab) === "profile" ? "tab-active" : ""  }}">Profiel</a>
			</li>
			<li>
				<a href="{{ route('user.password') }}" class="tab {{ trim($tab) === "password" ? "tab-active" : "" }}">Wachtwoord veranderen</a>
			</li>
		</ul>
	</div>

	<div class="tab-content">
		{{ $slot }}
	</div>
</div>