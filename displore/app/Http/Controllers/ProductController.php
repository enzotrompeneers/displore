<?php 

namespace App\Http\Controllers;

use Auth;
use App\Product;
use App\ProductReview;
use App\ProductImage;
use App\Http\Requests\StoreProduct;
use App\Http\Helpers\ImageHelper;
use Illuminate\Http\Request;

class ProductController extends Controller 
{

  /**
   * Geeft populaire en recent nieuwe ervaringen op het platform
   *
   * @return Response
   */
  public function index()
  {
    $products = Product::orderBy('id', 'desc')->take(30)->get();
    $images = ProductImage::take(30)->get();

    return view('discover', compact('products', 'images'));
  }

  /**
  * Zoekt door ervaringen
  * 
  * @return Response
  */
  public function search(Request $request)
  {
    $search_term = request('search_input');

    $products = Product::search($search_term)->get();

    return view('discover', compact('search_term', 'products'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('product.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreProduct $request)
  {

    $product = new Product();

    $product->title = request('title');
    $product->user_id = Auth::user()->id;
    $product->description = request('description');
    $product->price = request('price');
    $product->price_time = request('price_time');

    $product->save();

    ImageHelper::uploadMultiple(request('image'), $product->id);

    return redirect('/ervaring/toon/' . $product->id);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $product = Product::find($id);
    $images = ProductImage::where('product_id', $id)->get();

    if($product === null){
      return abort('404');
    }

    $reviews = $product->reviews()->get();

    return view('product.show', compact('product', 'reviews', 'images'));
  }

  /**
   * Display all your products
   * @return Response
   */
  public function showAll() {
    $product = Product::showAll();
    return view('product/show', compact('product'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $product = Product::find($id);
    $images = ProductImage::where('product_id', $id)->get();

    return view('product.edit', compact('product', 'images'));    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(StoreProduct $request, $id)
  {
    $product = Product::find($id);

    $product->title = request('title');
    $product->user_id = Auth::user()->id;
    $product->description = request('description');
    $product->price = request('price');
    $product->price_time = request('price_time');

    $product->save();

    ImageHelper::uploadMultiple(request('image'), $id);

    return redirect('/ervaring/toon/' . $product->id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $product = Product::find($id)->delete();

    return redirect('/gebruiker');
  }
  
}

?>