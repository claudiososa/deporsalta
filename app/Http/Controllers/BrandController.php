<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Http\Requests\CreateBrandRequest;

class BrandController extends Controller
{
  public function show(Brand $brand)
  {
    return view('brand.show',[
      'brand'=>$brand
    ]);
  }

  public  function list()
  {
    $brands = Brand::paginate(10);
    return view('brand.list',[
      'brands' => $brands
    ]);
  }

  public function new()
  {
    return view('brand.create');
  }

  public function create(CreateBrandRequest $request)
  {
    $user= $request->user();
    $brand = Brand::create([
      'user_id' => $user->id,
      'description' =>$request->input('description')     
    ]);
    return redirect('/viewbrand/'.$brand->id);
  }

  public function update(Brand $brand)
    {
      return view('brand.edit',[
        'brand' => $brand
      ]);
    }

    public function edit(CreateBrandRequest $request)
    {
      $user= $request->user();

      $brand = Brand::find($request->input('id'));

      $brand->id = $request->input('id');
      $brand->description = $request->input('description');
      $brand->marginReseller = $request->input('marginReseller');
      $brand->marginClient = $request->input('marginClient');
      $brand->user_id = $user->id;

      $brand->save();
      return view('brand.show',[
        'brand'=>$brand
      ]);
    }
}
