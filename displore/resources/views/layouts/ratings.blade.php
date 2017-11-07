
    <div class="card rating" id="rating">
        <div class="card-section">
        
            <div class="rating-block">

                <p>Geef een rating: </p>
                <form action="{{ route("review.store", $product->id) }}" method="post" class="rating" data-abide novalidate>
                {{ csrf_field() }}
                
                <div class="rating-block-rating" data-rating>
                    @for ($i = 1; $i < 6; $i++)
                        <label>
                            <input type="radio" name="stars" value="{{ $i }}" />
                            @for ($icon = 0; $icon < $i; $icon++)
                                <p class="icon">★</p>
                            @endfor
                        </label>
                    @endfor
                    
                </div>
            </div>
        </div>
    </div>
    @if($errors->has('stars'))
        <div>
            <small class="error" style="display: block;">Je moet je rating nog geven</small>       
        </div>
    @endif
    <textarea name="text" placeholder="Recensie schrijven"></textarea>
    @if($errors->has('text'))
        <small class="error" style="display: block;">{{ $errors->first('text') }}</small>
    @endif
    <input type="submit" class="button" value="Recensie insturen"/>
</form>
