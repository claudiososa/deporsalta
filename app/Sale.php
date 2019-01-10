<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  protected $guarded=[];

  public function waist()
  {
    return $this->belongsTo(Waist::class);
  }

  // public function product()
  // {
  //   return $this->hasOne(Product::class);    
  //   //return $this->belongsTo(Waist::class);
  // }

  public function product()
  {
    return $this->belongsTo(Product::class);
  }


}
