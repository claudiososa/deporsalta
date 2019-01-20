<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSaleRequest;
use App\Quantity;
use App\Sale;
use App\Waist;
use App\Product;

class SaleController extends Controller
{
    public  function list()
    {
      $sales = Sale::with([
        'product' => function($query){
         $query->get();
        }
      ])->where('status','=','0')->paginate(10);  
    return view('sale.list',[
      'sales' => $sales
    ]);    
  }

    public function create(CreateSaleRequest $request)
    {
      $user = $request->user();
      
      //dd($request);
      $quant = Quantity::where('product_id','=',$request->input('product_id'))->Where('waist_id','=',$request->input('waist_id'))->first();
      //dd($quant);
      if (!is_null($quant)) {
        if ($quant->quantity >= $request->input('quantity')) {
          $sale = Sale::create([
            'product_id' =>$request->input('product_id'),
            'user_id' => $user->id,
            'waist_id' =>$request->input('waist_id'),
            'quantity' =>$request->input('quantity'),
            'priceUnit' =>$request->input('priceUnit'),
            'total' =>$request->input('total')
          ]);       
          
          $quantUpdate = Quantity::where('product_id','=',$request->input('product_id'))
                ->Where('waist_id','=',$request->input('waist_id'))
                ->update(['quantity' => $quant->quantity-$request->input('quantity')]);
                        
          return redirect('/products'); 
        }else{
          $product = Product::where('id','=',$request->input('product_id'))->first();
          $waists =Waist::all();
          return view('sale.create',[
              'product'=>$product,
              'waists' =>$waists,
              'error'=>'No existe stock suficiente para realizar esta venta'
              ]);  
        }
      } else {
        $product = Product::where('id','=',$request->input('product_id'))->first();
          $waists =Waist::all();
          return view('sale.create',[
              'product'=>$product,
              'waists' =>$waists,
              'error'=>'No existe stock suficiente para realizar esta venta'
              ]);     
      }
      
      
    }

    public function delete($id)
    {
        $sale = Sale::findOrFail($id);

        $quant = Quantity::where('product_id','=',$sale->product_id)->Where('waist_id','=',$sale->waist_id)->first();

        $quantUpdate = Quantity::where('product_id','=',$sale->product_id)
        ->Where('waist_id','=',$sale->waist_id)
        ->update(['quantity' => $quant->quantity + $sale->quantity]);

        $sale->status = 1;
        $sale->save();

        return response()->json($sale);
    }
  
    public function new(Product $product)
    {
      $waists =Waist::all();
      return view('sale.create',[
        'product' =>$product,
        'waists' =>$waists,
        'error'=>''
      ]);
    }
}
