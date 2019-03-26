<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Waist;
use App\Http\Requests\CreateWaistRequest;

class WaistController extends Controller
{
  public function show(Waist $waist)
  {
    //$Colour = Colour::find($id);
    //dd($Colour);
    return view('waist.show',[
      'waist'=>$waist
    ]);
  }

  public  function list()
  {

    $waists = Waist::all();


    // foreach ($waists as $waist){
    //   Waist::where('id',$waist->id)->update([
    //     'order' => $waist->id
    //   ]);
    // }

    return view('waist.list',[
      'waists' => $waists
    ]);
  }

  public function new()
  {
    $waists = Waist::distinct()->select('type')->orderBy('type','asc')->get();
    $waist_details = Waist::orderBy('id','asc')->get();

    return view('waist.create',[
      'waists' => $waists,
      'waist_details' => $waist_details
    ]);
  }

  public function create(CreateWaistRequest $request)
  {
    $user= $request->user();
    $waist = Waist::create([
      'user_id' => $user->id,
      'description' =>$request->input('description')
    ]);

    return redirect('/viewwaist/'.$waist->id);

    //return 'guardado';
  }

  public function update(Waist $waist)
    {
      return view('waist.edit',[
        'waist' => $waist
      ]);
    }

    public function edit(CreateWaistRequest $request)
    {
      $user= $request->user();

      $waist = Waist::find($request->input('id'));

      $waist->id = $request->input('id');
      $waist->description = $request->input('description');
      $waist->user_id = $user->id;

      $waist->save();

      $waistOld =Waist::find($request->input('id'));

      if($request->input('order')<>$waistOld->order){
        $position = $request->input('order');
        if($request->input('order') < $waistOld->order){
           $waistDesdeHasta = Waist::where('order','>=',$position)
                            ->where('order','<>',$waistOld->order)       
                            ->orderBy('order','asc')->get();
        foreach($waistDesdeHasta as $item){
          $newValue = $item->order+1;

          $update = Waist::find($item->id)->update([
            'order'=>$newValue,
          ]);
        }
        $waistOld = Waist::find($request->input('id'))->update([
          'order' => $position
        ]);
        }else{
          $waistDesdeHasta = Waist::where('order','<=',$position)
          ->where('order','<>',$waistOld->order)       
          ->orderBy('order','asc')->get();
          //dd($waistDesdeHasta);
          
          foreach($waistDesdeHasta as $item){
            $newValue = $item->order-1;
  
            $update = Waist::find($item->id)->update([
              'order'=>$newValue,
            ]);
          }
          $waistOld = Waist::find($request->input('id'))->update([
            'order' => $position
          ]);
        }

        

        //dd($waistDesdeHasta);
        
        //$update =Waist::where('id',$request->input('id'))->update([

       //])
      }

      return view('waist.show',[
        'waist'=>$waist
      ]);
    }
}
