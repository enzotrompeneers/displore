<?php 

namespace App\Http\Controllers;

use Auth;
use App\ProductReview;
use App\Http\Requests\StoreReview;

class ProductReviewController extends Controller 
{
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreReview $request, $product_id)
  {
    $review = new ProductReview();

    $review->user_id = Auth::user()->id;
    $review->product_id = $product_id;
    $review->text = request('text');
    $review->stars = request('stars');

    $review->save();

    return redirect('/ervaring/toon/' . $product_id);
  }
  
}

?>