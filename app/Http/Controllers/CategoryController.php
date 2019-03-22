<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryWaist;
use App\Waist;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateCategoryWaistRequest;
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
      $waist_details = Waist::orderBy('id','asc')->get();
      //dd($waists);
      return view('category.create',[
        'waists' => $waists,
        'waist_details' => $waist_details
      ]);
    }

    public function create(CreateCategoryWaistRequest $request1,CreateCategoryRequest $request)
    {
      
      $user= $request->user();
      $category = Category::create([
        'user_id' => $user->id,
        'description' =>$request->input('description'),
        'type' =>'1'
      ]);

      foreach($request->type as $item){
        $categoryWaist = CategoryWaist::create([
          'category_id' => $category->id,
          'type' => $item,
          'user_id' => $user->id,        
        ]);
      }  
      
      //dd($category->id);
      //dd($request);
      return redirect('/viewcategory/'.$category->id);
    }

    public function update(Category $category)
      {
        $waists = Waist::distinct()->select('type')->orderBy('type','asc')->get();
        $waist_details = Waist::orderBy('id','asc')->get();
        $categoryWaistNow = CategoryWaist::where('category_id',$category->id)->get(); 
        
        return view('category.edit',[
          'category' => $category,
          'waists' => $waists,
          'waist_details' => $waist_details,
          'categoryWaistNow' => $categoryWaistNow
        ]);
      }

      public function edit(CreateCategoryWaistRequest $request1,CreateCategoryRequest $request)
      {
        $user= $request->user();

        $category = Category::find($request->input('id'));

        $category->id = $request->input('id');
        $category->description = $request->input('description');
        $category->user_id = $user->id;

        $category->save();

        $delete = CategoryWaist::where('category_id',$request->input('id'))->delete();

        //dd($delete);

        foreach($request->type as $item){
          $categoryWaist = CategoryWaist::create([
            'category_id' => $category->id,
            'type' => $item,
            'user_id' => $user->id,        
          ]);
        }  

        return view('category.show',[
          'category'=>$category
        ]);
      }



      //return 'guardado';

}
