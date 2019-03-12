<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productprice extends Model
{
  protected $guarded=[];
  
  // public function product()
  //   {
  //     return $this->belongsTo(Product::class);
  //   }

    public function waist()
    {
      return $this->belongsTo(Waist::class);
    }
}
