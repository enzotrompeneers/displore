<?php 

namespace App\Http\Controllers;

use Auth;
use App\Product;
use App\ProductReview;
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
    $products = Product::take(30)->get();

    return view('discover', compact('products'));
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
  public function store(Request $request)
  {
    $product = new Product();

    $product->title = request('title');
    $product->user_id = Auth::user()->id;
    $product->description = request('description');
    $product->price = request('price');
    $product->price_time = request('price_time');

    $product->save();

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
    $reviews = $product->reviews()->get();

    return view('product.show', compact('product', 'reviews'));
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

    return view('product.edit', compact('product'));    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $product = Product::find($id);

    $product->title = request('title');
    $product->user_id = Auth::user()->id;
    $product->description = request('description');
    $product->price = request('price');
    $product->price_time = request('price_time');

    $product->save();

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
    
  }
  
}

?>