<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $table = 'saledetails';
    protected $guarded=[];

    public function user()
    {
      return $this->belongsTo(User::class);
    } 

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function waist()
    {
        return $this->belongsTo(Waist::class);
    }    

}
