<?php 

namespace App\Http\Controllers;

use Auth;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('discover');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('product/create');
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
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
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