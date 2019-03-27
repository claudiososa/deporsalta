<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSaleRequest;
use App\Http\Requests\saleFilter;
use App\Quantity;
use App\Sale;
use App\Productprice;
use App\Waist;
use App\Category;
use App\Product;
use App\SaleDetail;
use App\Payment;

class SaleController extends Controller
{
    public  function list(saleFilter $request)
    {
      $sales = Sale::where('status','1')->get();
      $search = [];
      $sum =0;
      $totalResultado = [];
      $typePayment = [];   

      if($request->isMethod('post')){//si llega con una peticion con metodo post
      
        $search = [
          'firstDate' => date('d-m-Y', strtotime($request->firstDate)),
          'lastDate' => date('d-m-Y', strtotime($request->lastDate)),
        ];
        
        $salesDetail = Sale::with([
          'saledetail' => function($query){
           $query->get();
          },
          'payment' => function($query){
            $query->get();
           },
          'total' => function($query){
            $query->get();           
          },
          ])->where('status','<>','0')
            ->whereDate('date','>=',$request->firstDate)
            ->whereDate('date','<=',$request->lastDate)
            ->orderBy('id','desc')->get();
            //->paginate(5);  
        
        //dd($salesDetail);
        $efectivo = 0;
        $debito = 0;
        $credito = 0;
        $countSales =0;    
        $countProduct =0;

        foreach ($salesDetail as $sale) {

          $countSales = $countSales + 1;

          foreach ($sale->saledetail as $item){
            $countProduct = $countProduct + $item->quantity;
          }

          foreach ($sale->total as $total){
            $sum = $sum + $total->totalSale;
          }

          foreach ($sale->payment as $typePayment){

            switch ($typePayment->type) {
              case 'efectivo':
                $efectivo = $efectivo + $typePayment->amount;
                break;
              case 'debito':
                $debito = $debito + $typePayment->amount;
                break;
              default:
                $credito = $credito + $typePayment->amount;
                break;
            }             

          }
        }
        
        $typePayment= [
          'efectivo' => $efectivo,
          'debito' => $debito,
          'credito' => $credito,
          'countSales' => $countSales,
          'countProduct' => $countProduct
        ];
        
        //dd($typePayment);
        $totalResultado= [
          'montoTotal' => $sum,
        ];
      }else{     
        $salesDetail = Sale::with([
        'saledetail' => function($query){
         $query->get();
        },
        'total' => function($query){
          $query->get();
         },
        ])->where('status','<>','0')->orderBy('id','desc')->paginate(5);  
        
    } 
    return view('sale.list',[
      'sales' => $sales,
      'salesDetail' => $salesDetail,
      'search' => $search,
      'montoTotal' => $totalResultado,
      'typePayment' => $typePayment
    ]);  
      
  }

    public function new(Product $product)//agrega nuevo item a venta actual
    {
      $sale = Sale::where('status','0')->count();

      $quantities = Quantity::with([
        'waist' => function($query){
         $query->get();
        }
        ])->join('productprices', function($join)
          {
            $join->on('productprices.product_id','=','quantities.product_id');
            $join->on('productprices.waist_id','=','quantities.waist_id');
          })
      ->where('quantities.product_id',$product->id)->where('quantities.quantity','<>','0')->get();     

      if ($sale > 0) {
        $sale = Sale::where('status','0')->first();        
      } else {
        $sale = Sale::create([
          'date' => date('Y-m-d'),
          'client_id' => '1',
          'user_id' =>'1',
          'status' =>'0'          
        ]);        
      }           
      $productImage = Product::with([
        'picture' => function($query){
          $query->first();
        }
      ])->find($product->id);
      
      $category = Category::find($product->category_id);
      $waists =Waist::where('type',$category->type)->get();
      return view('sale.create',[
        'product' =>$product,
        'waists' =>$waists,
        'category' => $category,
        'sale' => $sale,
        'error'=>'',
        'quantities' => $quantities,
        'productImage' => $productImage
        ]);
    }

    public function create(CreateSaleRequest $request)
    {
      $searchDetail = SaleDetail::where('sale_id',$request->sale_id)
                                  ->where('product_id',$request->product_id)
                                  ->where('waist_id',$request->waist_id)
                                  ->count();
      //dd($searchDetail);
      if($searchDetail > 0)
      {


        $udpateDetail = SaleDetail::where('sale_id',$request->sale_id)
                                  ->where('product_id',$request->product_id)
                                  ->where('waist_id',$request->waist_id)
                                  ->update(['quantity' => $request->quantity,
                                            'priceUnit' => $request->priceUnit,
                                            'total' => $request->total]);
       
      }else{
        $saleDetail = SaleDetail::create([
          'sale_id' => $request->sale_id,
          'product_id' => $request->product_id,
          'waist_id' => $request->waist_id,
          'quantity' => $request->quantity,
          'priceUnit' => $request->priceUnit,
          'total' => $request->total,
          'status' => '0'
        ]);
      }                           

      
      return redirect('productsale');
    }

    public function delete($id)
    {
        return response()->json(SaleDetail::destroy($id));
    }

    public function sumTotal($id)
    {
       $total = SaleDetail::where('sale_id',$id)->sum('total');

        return response()->json($total);
    }

    public function confirm($id)
    {
       $sale = Sale::find($id);
       $sale->status = '1';
       $sale->save();

        return response()->json($sale);
    }


    public function priceUnit(Request $request)    
    {
       $price = Productprice::join('quantities', function($join)
       {
         $join->on('quantities.product_id','=','productprices.product_id');
         $join->on('quantities.waist_id','=','productprices.waist_id');
        })      
       ->where('productprices.product_id',$request->product_id)->where('productprices.waist_id',$request->waist_id)->first();       
       return response()->json($price);
    }


    //public function confirmPost(Request $request)
    public function confirmPost($sale_id,$montoEfectivo,$tipoTarjeta,$montoTarjeta)
    {
      //dd($request);
    //    $sale = Sale::find($request->sale_id);
    //    $sale->status = '1';
    //    $sale->save();

    //    $details = SaleDetail::where('sale_id',$request->sale_id)->get();

    //    foreach( $details as $item)
    //    {
    //       $quantity = Quantity::where('product_id',$item->product_id)->where('waist_id',$item->waist_id)->first();

    //       $quantity->quantity = $quantity->quantity - $item->quantity;
    //       Quantity::where('product_id',$item->product_id)->where('waist_id',$item->waist_id)->update(['quantity' => $quantity->quantity]);
         
    //     }
       
    //    if ($request->montoEfectivo !='0') {
    //       $payment = Payment::create([
    //         'sale_id' => $request->sale_id,
    //         'type' => 'efectivo',
    //         'amount' => $request->montoEfectivo
    //       ]);
    //    }

    //    if ($request->montoTarjeta !='0') {
    //     $payment = Payment::create([
    //       'sale_id' => $request->sale_id,
    //       'type' => $request->tipoTarjeta,
    //       'amount' => $request->montoTarjeta
    //     ]);
    //  }
       
       
       $sale = Sale::find($sale_id);
       $sale->date = date("Y-m-d H:i:s");
       $sale->status = '1';
       $sale->save();

       $details = SaleDetail::where('sale_id',$sale_id)->get();

       foreach( $details as $item)
       {
          $quantity = Quantity::where('product_id',$item->product_id)->where('waist_id',$item->waist_id)->first();

          $quantity->quantity = $quantity->quantity - $item->quantity;
          Quantity::where('product_id',$item->product_id)->where('waist_id',$item->waist_id)->update(['quantity' => $quantity->quantity]);
          //$quantity->save();
        }
       //dd($quantity);
       if ($montoEfectivo !='0') {
          $payment = Payment::create([
            'sale_id' => $sale_id,
            'type' => 'efectivo',
            'amount' => $montoEfectivo
          ]);
       }

       if ($montoTarjeta !='0') {
        $payment = Payment::create([
          'sale_id' => $sale_id,
          'type' => $tipoTarjeta,
          'amount' => $montoTarjeta
        ]);
     } 
        return response()->json($sale);
    }

    public function addItem(Product $product, Waist $waist)      
    {
      $price = Productprice::where('product_id',$product->id)
                            ->where('waist_id',$waist->id)
                            ->get()->first();
                               
        
        // $sale = Sale::findOrFail($id);

        // $quant = Quantity::where('product_id','=',$sale->product_id)->Where('waist_id','=',$sale->waist_id)->first();

        // $quantUpdate = Quantity::where('product_id','=',$sale->product_id)
        // ->Where('waist_id','=',$sale->waist_id)
        // ->update(['quantity' => $quant->quantity + $sale->quantity]);

        // $sale->status = 1;
        // $sale->save();
        //dd($price);
        return response()->json($price);
    }
  
  
}
