<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use App\Colour;
use App\Quota;
use App\Waist;
use App\Productprice;
use App\Sale;
use App\SaleDetail;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\SearchProductRequest;
use App\Http\Requests\SelectCategoryRequest;

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

  public function searchProductSale(Request $request){
    $sale = Sale::where('status','0')->count();

    if ($sale >0) {
      $sale = Sale::where('status','0')->get()->first();
      
      $saleDetail =SaleDetail::where('sale_id',$sale->id)->get();
      $totalSale = SaleDetail::where('sale_id',$sale->id)->sum('total');
    } else {
      $saleDetail = '';
      $totalSale = '';
      $sale = '';
    }

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
    //dd($products);
  $brands = Brand::all();  
  $categories = Category::all();
  $quotas = Quota::all();      
  return view('product.listSale',[
    'products' => $products,
    'categories' => $categories,
    'brands' => $brands,
    'saleDetail' => $saleDetail,
    'totalSale' => $totalSale,
    'sale' => $sale,
    'quotas' => $quotas
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

  public function new(SelectCategoryRequest $request)
  {
    
    $category =Category::find($request->category_id);
    
    $waists =Waist::where('type',$category->type)->orderBy('id','asc')->get();
    //dd($waists);    
    $brands = Brand::all();
    $colours = Colour::all();
    return view('product.create',[      
      'waists' =>$waists,
      'category' =>$category,
      'brands' => $brands,
      'colours' => $colours
    ]);
  }

  public function selectCategory()
  {
    $categories = Category::all();    
    return view('product.selectCategory',[
      'categories' => $categories      
    ]);
  }

  public function create(CreateProductRequest $request)
  {
    //dd($request);
    $user = $request->user();
    if ($request->input('special') == 'on'){      
      $special = 1;
    }else{
      $special = 0;
    }

    $product = Product::create([
      'description' => $request->input('description'),
      'special'=>$special,
      'category_id'=>$request->category_id,
      'brand_id'=>$request->input('brand_id'),
      'colour_id'=>$request->input('colour_id'),
      //'user_id'=>'1',

    ]);

    //dd($product);
    $waists = Waist::where('type',$request->type)->get();
    //dd($waists);

    foreach ($waists as $waist){
      //$dato =${'request->priceCost'.$waist->id};
      //$dato =${'priceCost'.$waist->id};

      //dd($request->input('priceCost'.$waist->id));
      $price = Productprice::create([
        'product_id' => $product->id,
        'waist_id'=>$waist->id,
        'price_cost'=>$request->input('priceCost'.$waist->id),
        'price_sale'=>$request->input('priceClient'.$waist->id),        
        
  
      ]);
      //dd($request->priceCost+$waist->id);
    }

      
    
   
    return redirect('/viewproduct/'.$product->id);
  }

  public function update(Product $product)
    {
      $category = Category::find($product->category_id);
      $categories = Category::all();
      $brands = Brand::all();
      $colours = Colour::all();
      $waists =Waist::where('type',$category->type)->orderBy('id','asc')->get();
      $productPrice = Productprice::where('product_id',$product->id)->get();
      //dd($productPrice);
      return view('product.edit',[
        'product' => $product,
        'categories' => $categories,
        'brands' => $brands,
        'colours' => $colours,
        'category' => $category,
        'waists' => $waists,
        'productPrice' => $productPrice
      ]);    
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
      // $product->priceCost = $request->input('priceCost');
      // $product->priceReven = $request->input('priceReven');
      // $product->priceClient = $request->input('priceClient');
      // $product->marginReseller = $request->input('marginReseller');
      // $product->marginClient = $request->input('marginClient'); 
      $product->special = $special;
      $product->category_id = $request->input('category_id');
      $product->brand_id = $request->input('brand_id');
      $product->colour_id = $request->input('colour_id');

      $product->save();
         
      $waists = Waist::where('type',$request->type)->get();
    
      $prices = Productprice::where('product_id',$product->id)->get();
      //dd($prices);
      foreach($waists as $waist){

        foreach ($prices as $price) {
          
          if($price->waist_id == $waist->id)
          {
            $p =Productprice::find($price->id);
            $p->price_cost = $request->input('priceCost'.$waist->id);
            $p->price_sale = $request->input('priceClient'.$waist->id);
            $p->save();            
          }
          
        }
      }
      


      // foreach ($waists as $waist){    
      //   $price = Productprice::create([
      //     'product_id' => $product->id,
      //     'waist_id'=>$waist->id,
      //     'price_cost'=>$request->input('priceCost'.$waist->id),
      //     'price_sale'=>$request->input('priceClient'.$waist->id),        
          
    
      //   ]);        
      // }


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
        // 'productprice' => function($query){
        //     $query->get();
        //     },  
        'quantitySum' => function($query){
          $query->get();
        },
        'picture' => function ($query){
          $query->get();
        }

      ])->orderBy('id','desc')->paginate(10);
    
   // dd($products);

    return view('product.list',[
      'products' => $products,
      'categories' => $categories,
      'brands' => $brands
    ]);
  }

  public  function listSale()
  {
    $saleCount = Sale::where('status','0')->count();

    if ($saleCount >0) {
      $sale = Sale::where('status','0')->get()->first();
      
      $totalSale = SaleDetail::where('sale_id',$sale->id)->sum('total');

      $saleDetail =SaleDetail::with([
        'product' => function ($query){
          $query->get();
        },
        'waist' => function ($query){
          $query->get();
        }       
      ])->where('sale_id',$sale->id)->get();
    } else {
      $saleDetail = '';
      $totalSale = '';
      $sale = '';
    }

    $categories = Category::all();
    $brands = Brand::all();
    $quotas = Quota::all();      
    //dd($saleDetail);
    return view('product.listSale',[
      'categories' => $categories,
      'brands' => $brands,
      'saleDetail' => $saleDetail,
      'totalSale' => $totalSale,
      'sale' => $sale,
      'quotas' => $quotas
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
        'productpriceUnico' => function ($query) {
          $query->get();
          },
        'quantity' => function($query){
          $query->with('waist')->get();
          },       
        'quantitySum' => function($query){
          $query->get();
        },
        'picture' => function ($query){
          $query->get();
        } 
      ])->orderBy('id','desc')->paginate(12);  
      //dd($products);
      $categories = Category::with([
         'productsCount' => function($query){
          $query->get();
          },
        // 'products' => function($query){
        //   $query->count();
        // }
      ])->get();
     
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
