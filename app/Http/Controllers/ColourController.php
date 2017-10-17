<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateColourRequest;
use App\Colour;

class ColourController extends Controller
{
  public function show(Colour $colour)
  {
    //$Colour = Colour::find($id);
    //dd($Colour);
    return view('colour.show',[
      'colour'=>$colour
    ]);
  }

  public  function list()
  {
    $colours = Colour::paginate(10);
    return view('colour.list',[
      'colours' => $colours
    ]);
  }

  public function new()
  {
    return view('colour.create');
  }

  public function create(CreateColourRequest $request)
  {
    $user= $request->user();
    $colour = Colour::create([
      'user_id' => $user->id,
      'description' =>$request->input('description')
    ]);

    return redirect('/viewcolour/'.$colour->id);

    //return 'guardado';
  }

  public function update(Colour $colour)
    {
      return view('colour.edit',[
        'colour' => $colour
      ]);
    }

    public function edit(CreateColourRequest $request)
    {
      $user= $request->user();

      $colour = Colour::find($request->input('id'));

      $colour->id = $request->input('id');
      $colour->description = $request->input('description');
      $colour->user_id = $user->id;
      dd($colour);
      $colour->save();
      return view('colour.show',[
        'colour'=>$colour
      ]);
    }
}
