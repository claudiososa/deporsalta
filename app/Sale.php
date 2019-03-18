<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  protected $guarded=[];

  public function user()
    {
      return $this->belongsTo(User::class);
    } 

    public function saledetail()
    {
      return $this->belongsTo(SaleDetail::class);
    } 

}
