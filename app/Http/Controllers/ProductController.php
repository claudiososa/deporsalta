<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use App\Colour;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;

class ProductController extends Controller
{

  public function show(Product $product)
  {
    $product = Product::with(['quantity' => function($query){
      $query->with('waist')->get();
    }])->find($product->id);
    //$quantities =$product->quantity;
    return view('product.show',[
      'product'=>$product,
      'quantities'=>$quantities
    ]);
  }

  public function new()
  {
    $categories = Category::all();
    $brands = Brand::all();
    $colours = Colour::all();
    return view('product.create',[
      'categories' => $categories,
      'brands' => $brands,
      'colours' => $colours,
    ]);
  }

  public function create(CreateProductRequest $request)
  {
    $user = $request->user();

    //dd($request);
    $product = Product::create([
      'description' => $request->input('description'),
      'priceCost' => $request->input('priceCost'),
      'marginReseller'=>$request->input('marginReseller'),
      'marginClient'=>$request->input('marginClient'),
      'category_id'=>$request->input('category_id'),
      'brand_id'=>$request->input('brand_id'),
      'colour_id'=>$request->input('colour_id'),
      //'user_id'=>'1',

    ]);

    return redirect('/viewproduct/'.$product->id);
  }

  public function update(Product $product)
    {
      $categories = Category::all();
      $brands = Brand::all();
      $colours = Colour::all();
      return view('product.edit',[
        'product' => $product,
        'categories' => $categories,
        'brands' => $brands,
        'colours' => $colours,
      ]);
      //return view('product.edit',[

      //]);
    }

    public function edit(CreateProductRequest $request)
    {
      $user= $request->user();

      $product = Product::find($request->input('id'));

      $product->id = $request->input('id');
      $product->description = $request->input('description');
      $product->priceCost = $request->input('priceCost');
      $product->marginReseller = $request->input('marginReseller');
      $product->marginClient = $request->input('marginClient');
      $product->category_id = $request->input('category_id');
      $product->brand_id = $request->input('brand_id');
      $product->colour_id = $request->input('colour_id');

      $product->save();
      return view('product.show',[
        'product'=>$product
      ]);
    }


  public  function list()
  {
      $products = Product::with([
        'quantity' => function($query){
          $query->with('waist')->get();
          },
        'quantitySum' => function($query){
          $query->get();
        },
        'image' => function ($query){
          $query->get();
        }

      ])->paginate(10);

      //dd($products);
    return view('product.list',[
      'products' => $products
    ]);
  }

  public  function catalogo()
  {
      $products = Product::with([
        'quantity' => function($query){
          $query->with('waist')->get();
          },
        'quantitySum' => function($query){
          $query->get();
        },
        'image' => function ($query){
          $query->get();
        }

      ])->paginate(12);

      //dd($products);
    return view('product.catalogo',[
      'products' => $products
    ]);
  }
}
