<div class="modal-overlay">
	<div class="modal">
		<div class="modal-title row">
			<div class="medium-10 cell">
				<h1>{{ $title }}</h1>
			</div>
			<div class="medium-2 cell">
				<a href="{{ trim($cancel_link) }}">
					<img src="{{ asset('assets/graphics/close_icon_black.svg') }}" class="modal-close right" height="40px" width="40px">
				</a>
			</div>
			
		</div>
		<div class="modal-content">
			{{ $content }}
		</div>
		
		<div class="modal-buttons">
			{{ $buttons }}
		</div>
		
	</div>
</div>