
    <div class="card rating">
        <div class="card-section">
        
            <div class="rating-block">
            
                <p class="ratings-type">Geef een rating</p>
                <form action="{{ route("review.store", $product->id) }}" method="post" class="rating" data-abide novalidate>
                {{ csrf_field() }}
                
                <div class="rating-block-rating" data-rating>
                    @for ($i = 1; $i < 6; $i++)
                        <label>
                            <input type="radio" name="stars" value="{{ $i }}" />
                            @for ($icon = 0; $icon < $i; $icon++)
                                <span class="icon">★</span>
                            @endfor
                        </label>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <textarea name="text" placeholder="recensie schrijven"></textarea>
    <input type="submit" class="button" value="Recensie insturen"/>
</form>
