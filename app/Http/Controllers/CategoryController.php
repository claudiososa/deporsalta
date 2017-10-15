<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
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
      return view('category.create');
    }

    public function create(CreateCategoryRequest $request)
    {
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
