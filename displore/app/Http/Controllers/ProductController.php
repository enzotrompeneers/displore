<?php 

namespace App\Http\Controllers;

use Auth;
use App\Product;
use App\ProductReview;
use App\ProductImage;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Http\Helpers\ImageHelper;

use Carbon\Carbon;
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
    $category = request('category');
    $date = Carbon::parse(request('date'))->diffForHumans();
    $datetime = Carbon::parse(request('date'));

    $products = Product::search($search_term)
    ->where('category', $category)
    ->get();

    foreach($products as $product)
    {
      if(!$product->availabilities()
        ->where('date', '=', $datetime)
        ->exists())
      {
        $products = $products->keyBy('id');
        $products->forget($product->id);
      }
    }
    
    return view('discover', compact('search_term', 'category', 'date', 'datetime', 'products'));
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
    $user = Auth::user();

    if($user->paypal === "" || $user->paypal === null){
      return redirect()->route('product.create');
    }

    $product = new Product();

    $product->title = request('title');
    $product->user_id = $user->id;
    $product->description = request('description');
    $product->category = request('category');
    $product->location = request('location');
    $product->price = request('price');
    $product->price_time = request('price_time');

    $product->save();

    ImageHelper::uploadMultiple(request('image'), $product->id);

    return redirect()->route('availability.create', ['id' => $product->id]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $product = Product::findOrFail($id);
    $images = ProductImage::where('product_id', $id)->get();
    $relevantProducts = Product::where('category', $product->category)->take(4)->get();

    if($product === null){
      return abort('404');
    }

    $reviews = $product->reviews()->get();

    return view('product.show', compact('product', 'reviews', 'images', 'relevantProducts'));
  }

  /**
   * Display all your products
   * @return Response
   */
  public function showAll() {
    $product = Product::showAll();
    return view('product.show', compact('product'));
  }

  /**
  * Toont een willekeurige ervaring voor de avontuurlijke mensen
  * @return response
  */

  public function random(){
    $product = Product::inRandomOrder()->first();
    
    return view('product.random', compact('product'));
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
  public function update(UpdateProduct $request, $id)
  {
    $product = Product::find($id);

    $product->title = request('title');
    $product->user_id = Auth::user()->id;
    $product->description = request('description');
    $product->category = request('category');
    $product->location = request('location');
    $product->price = request('price');
    $product->price_time = request('price_time');

    $product->save();

    ImageHelper::uploadMultiple(request('image'), $id);

    return redirect()->route('product.show', ['id' => $product->id]);
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

    return redirect()->route('user.profile');
  }
  
}

?>