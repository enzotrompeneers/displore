<?php 

namespace App\Http\Controllers;

use App\ProductImage;
use Storage;

class ProductImageController extends Controller 
{

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $productImage = ProductImage::find($id);

    Storage::delete($productImage->image);

    $productImage->delete();
  }
  
}

?>