<?php 

namespace App\Http\Helpers;

use App\ProductImage;

class ImageHelper{

	public static function uploadMultiple(Request $images){
		foreach($images as $imageUploaded){
	      $image = new ProductImage();

	      $url = $imageUploaded->store('ervaringen');

	      $image->product_id = $product->id;
	      $image->image = $url;

	      $image->save();
	    }
	}
}