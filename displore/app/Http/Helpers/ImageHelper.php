<?php 

namespace App\Http\Helpers;

use App\ProductImage;

class ImageHelper{

	public static function uploadMultiple($images, $product_id){
		if(sizeof($images) === 0){
			return;
		}

		foreach($images as $imageUploaded){
	      $image = new ProductImage();

	      $url = $imageUploaded->store('ervaringen');

	      $image->product_id = $product_id;
	      $image->image = $url;

	      $image->save();
	    }
	}
}