<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateQuantityRequest;
use App\Quantity;
use App\Waist;
use App\Product;
use App\Category;
use App\CategoryWaist;

class QuantityController extends Controller
{
  public function create(CreateQuantityRequest $request)
  {
    $user = $request->user();

    $quant = Quantity::where('product_id','=',$request->input('product_id'))->Where('waist_id','=',$request->input('waist_id'))->first();

    if (!$quant) {
      $quantity = Quantity::create([
        'product_id' =>$request->input('product_id'),
        'user_id' => $user->id,
        'waist_id' =>$request->input('waist_id'),
        'quantity' =>$request->input('quantity')
      ]);
    }else{
      $qt = $quant->quantity + $request->input('quantity');

      Quantity::where('product_id','=',$request->input('product_id'))->Where('waist_id','=',$request->input('waist_id'))->update(
        [
          'product_id' => $request->input('product_id'),
          'waist_id' => $request->input('waist_id'),
          'quantity' => $qt,
          'user_id' => $user->id
        ]
      );
    }
    return redirect('/products');
  }

  public function new(Product $product)
  {
    //$category = Category::find($product->category_id);

    $categoryWaist =CategoryWaist::where('category_id',$product->category_id)->get();
    
    $waists = [];
    foreach ($categoryWaist as $item){
      $searchWaist = Waist::where('type',$item->type)->get();

      foreach ($searchWaist as $itemWaist){
        $waists[] = [
                    'id' =>$itemWaist->id,
                    'description' => $itemWaist->description
                    ];
      }
    }
//    $waists
    
    //dd($waists);

    return view('quantity.create',[
      'product' =>$product,
      'waists' =>$waists
    ]);
  }
}
