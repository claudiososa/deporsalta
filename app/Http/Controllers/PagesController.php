<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colour;
use App\Category;

class PagesController extends Controller
{
    public  function home()
    {
      return view('sections.home');
    }

    public  function aboutUs()
    {
      return view('sections.aboutUs');
    }




}
