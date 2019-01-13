<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colour;
use App\Category;
use App\Album;
use App\Product;

class PagesController extends Controller
{
    public  function home()
    {
      $productSpecial = Product::with([
        'picture' => function($query){
          $query->get();
        }
      ])->where('special','=',1)->get();

      $albums = Album::all();
      //dd($productSpecial);
      return view('sections.home',[
        'albums'=> $albums,
        'productSpecial'=>$productSpecial
      ]);
    }

    public  function aboutUs()
    {
      return view('sections.aboutUs');
    }

    public function contact()
    {
      return view('sections.contact');
    }


}
