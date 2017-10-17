<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\Http\Requests\CreateImageRequest;

class ImageController extends Controller
{
    //
    public function create(CreateImageRequest $request)
    {
      $user = $request->user();
      $image = $request->file('description');

      $image = Image::create([
        'product_id' =>$request->input('product_id'),
        'user_id' => $user->id,
        'description' =>$image->store('products','public')
      ]);

      return redirect('/products');
    }

    public function new(Product $product)
    {
      $images = Image::where('product_id',$product->id)->get();
      //dd($images);
      return view('image.create',[
        'product' =>$product,
        'images'=>$images
      ]);
    }

    public function delete(Image $image)
    {
        Image::find($image->id)->delete();
        //dd($image);
        return redirect('/image/new/'.$image->product_id);
    }
}
