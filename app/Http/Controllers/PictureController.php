<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Picture;
use App\Http\Requests\CreateImageRequest;

class PictureController extends Controller
{
    //
    public function create(CreateImageRequest $request)
    {
      //dd($request->file('description'));
      $user = $request->user();
      $image = $request->file('description');

      $image = Picture::create([
        'product_id' =>$request->input('product_id'),
        'user_id' => $user->id,
        'description' =>$image->store('products','public')
      ]);

      return redirect('/products');
    }

    public function new(Product $product)
    {
      $images = Picture::where('product_id',$product->id)->get();
      //dd($images);
      return view('image.create',[
        'product' =>$product,
        'images'=>$images
      ]);
    }

    public function delete(Picture $image)
    {
        Picture::find($image->id)->delete();
        //dd($image);
        return redirect('/image/new/'.$image->product_id);
    }
}
