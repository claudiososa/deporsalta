<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use App\Colour;
use App\Waist;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\SearchProductRequest;

class ProductController extends Controller
{

  public function searchProduct(Request $request){
    $products = Product::with([
      'quantity' => function($query){
        $query->with('waist')->get();
        },
      'quantitySum' => function($query){
        $query->get();
      },
      'picture' => function ($query){
        $query->get();
      }    
     ])->where(function ($query) use ($request){
        if ($request->id<>"") {
          $query->where('id',$request->id);  # code...
        }
        if ($request->description) {
          $query->where('description','LIKE','%'.$request->description.'%');
        }
        if ($request->category_id) {
          $query->where('category_id','=',$request->category_id);
        }
        if ($request->brand_id) {
          $query->where('brand_id','=',$request->brand_id);
        }                  
    })->orderBy('id','desc')->paginate(10);
    
    
  //   ->where(function($q) {
  //     $q->where('Cab', 2)
  //       ->orWhere('Cab', 4);
  // })
  $brands = Brand::all();  
  $categories = Category::all();
  return view('product.list',[
    'products' => $products,
    'categories' => $categories,
    'brands' => $brands
  ]);
  }  

  public function search(Product $product)
  {
    $categories = Category::all();
    $brands = Brand::all();
    $colours = Colour::all();
    $waists = Waist::all();
    return view('product.search',[
      'categories'=>$categories,
      'brands' => $brands,
      'colours' => $colours,
      'waists' => $waists
    ]);
  }

  public function show(Product $product)
  {
    $product = Product::with(['quantity' => function($query){
      $query->with('waist')->get();
    }])->find($product->id);
    //$quantities =$product->quantity;
    return view('product.show',[
      'product'=>$product,
      //'quantities'=>$quantities
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
    if ($request->input('special') == 'on'){      
      $special = 1;
    }else{
      $special = 0;
    }
      
    
    $product = Product::create([
      'description' => $request->input('description'),
      'priceCost' => $request->input('priceCost'),
      'priceReven'=>$request->input('priceReven'),
      'priceClient'=>$request->input('priceClient'),
      'marginReseller'=>$request->input('marginReseller'),
      'marginClient'=>$request->input('marginClient'),
      'special'=>$special,
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
      if ($request->input('special') == 'on'){      
        $special = 1;
      }else{
        $special = 0;
      }        

      $product->id = $request->input('id');
      $product->description = $request->input('description');
      $product->priceCost = $request->input('priceCost');
      $product->priceReven = $request->input('priceReven');
      $product->priceClient = $request->input('priceClient');
      $product->marginReseller = $request->input('marginReseller');
      $product->marginClient = $request->input('marginClient'); 
      $product->special = $special;
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
      $categories = Category::all();
      $brands = Brand::all();
      $products = Product::with([
        'quantity' => function($query){
          $query->with('waist')->get();
          },
        'quantitySum' => function($query){
          $query->get();
        },
        'picture' => function ($query){
          $query->get();
        }

      ])->orderBy('id','desc')->paginate(10);
    
    return view('product.list',[
      'products' => $products,
      'categories' => $categories,
      'brands' => $brands
    ]);
  }

  public function searchPost(SearchProductRequest $request)
  {
    $products = Product::whereHas('category', function($query) use ($request) {
        if ($request->categories <> "0") {
        $query->where('id',$request->categories);
        }
      })->whereHas(
        'brand',function($query) use ($request){
          if ($request->brands <> "0") {
            $query->where('id',$request->brands);
          }
        })
        ->whereHas(
          'colour',function($query) use ($request){
            if ($request->colours <> "0") {
              $query->where('id',$request->colours);
            }
          })
      ->with('category','brand','colour')
      ->with([
        'quantity' => function($query){
          $query->with('waist')->get();
          },
        'quantitySum' => function($query){
          $query->get();
        },
        'picture' => function ($query){
          $query->get();
        }
      ])->where(function ($query) use ($request){
          if ($request->description <>""){
            return $query->where('description','LIKE','%'.$request->description.'%');
          }
        })->get();
        //
        //{

        //}


      //dd($products);
      return view('product.searchList',[
        'products' =>$products
      ]);
  }

  public  function catalogo()
  {
    $products = Product::with([
        'quantity' => function($query){
          $query->with('waist')->get();
          },
        // 'quantitySum' => function($query){
        //   $query->get();
        // },
        'picture' => function ($query){
          $query->get();
        }

      ])->withCount('quantity')->paginate(12);
      
      // $categories = Category::all();

      $categories = Category::with([
         'productsCount' => function($query){
          $query->get();
          },
        // 'products' => function($query){
        //   $query->count();
        // }
      ])->get();

      //dd($categories);



    return view('product.catalogo',[
      'products' => $products,
      'categories' => $categories
    ]);
  }

  public  function catalogoCategory(Category $category)
  {
      $products = Product::whereHas('category', function($query) use ($category) {
          $query->where('id',$category->id);
        })->with([
        'quantity' => function($query){
          $query->with('waist')->get();
          },
        'quantitySum' => function($query){
          $query->get();
        },
        'picture' => function ($query){
          $query->get();
        }

      ])->withCount('quantity')->paginate(12);

      $categories = Category::all();
      //dd($categories);
    return view('product.catalogo',[
      'products' => $products,
      'categories' => $categories
    ]);
  }
}
