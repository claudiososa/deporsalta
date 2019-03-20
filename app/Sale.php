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
      return $this->hasMany(SaleDetail::class);
    } 

   public function total() {
      return $this->hasMany(SaleDetail::class)
          ->select('sale_id', \DB::raw('sum(`total`) as `totalSale`'))
          ->groupBy('sale_id');
  }

}
