<div class="modal-overlay {{ isset($overlay_class) ? trim($overlay_class) : ""}}" id="modal-overlay">
	<div class="modal {{ isset($class) ? trim($class) : ""}}" id="{{ isset($id) ? trim($id) : ""}}">
		<div class="modal-title row">
			<div class="medium-10 columns">
				<h1 class="modal-title-text">{{ $title or ""}}</h1>
			</div>
			<div class="medium-2 columns">
				<a href="{{ isset($cancel_link) ? trim($cancel_link) : "" }}" id="modal-close">
					<img src="{{ asset('assets/graphics/close_icon_black.svg') }}" class="modal-close right" height="40px" width="40px">
				</a>
			</div>
			
		</div>
		<div class="modal-content">
			{{ $content or ""}}
		</div>
		
		<div class="modal-buttons">
			{{ $buttons or ""}}
		</div>
		
	</div>
</div>