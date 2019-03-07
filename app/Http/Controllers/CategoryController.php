<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Waist;
use App\Http\Requests\CreateCategoryRequest;
//use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
      //$category = Category::find($id);
  //    dd($category);
      return view('category.show',[
        'category'=>$category
      ]);
    }

    public  function list()
    {
      $categories = Category::paginate(10);
      //dd($categories);
      return view('category.list',[
        'categories' => $categories
      ]);
    }

    public function new()
    {
      $waists = Waist::distinct()->select('type')->orderBy('type','asc')->get();
      $waist_details = Waist::orderBy('type','asc')->get();
      //dd($waists);
      return view('category.create',[
        'waists' => $waists,
        'waist_details' => $waist_details
      ]);
    }

    public function create(CreateCategoryRequest $request)
    {
      dd($request);
      $user= $request->user();
      $category = Category::create([
        'user_id' => $user->id,
        'description' =>$request->input('description')
      ]);
      return redirect('/viewcategory/'.$category->id);
    }

    public function update(Category $category)
      {
        return view('category.edit',[
          'category' => $category
        ]);
      }

      public function edit(CreateCategoryRequest $request)
      {
        $user= $request->user();

        $category = Category::find($request->input('id'));

        $category->id = $request->input('id');
        $category->description = $request->input('description');
        $category->user_id = $user->id;

        $category->save();
        return view('category.show',[
          'category'=>$category
        ]);
      }



      //return 'guardado';

}
