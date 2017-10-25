<div class="card rating">
  <div class="card-section">
    <div class="rating-block">
      <p class="ratings-type">Geef een rating</p>
      <div class="rating-block-rating" data-rating>
        @for ($i = 1; $i < 6; $i++)
            <div class="star">
            <span hidden><input hidden type="number" min="0" max="5" name="stars" value="{{ $i }}" /></span>
            <svg  width="40" height="37" viewBox="0 0 40 37">
                <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
            </svg>
            </div>
        @endfor
      </div>
    </div>
  </div>
</div>

