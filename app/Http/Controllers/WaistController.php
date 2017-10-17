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
    $waists = Waist::paginate(10);
    return view('waist.list',[
      'waists' => $waists
    ]);
  }

  public function new()
  {
    return view('waist.create');
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
      return view('waist.show',[
        'waist'=>$waist
      ]);
    }
}
