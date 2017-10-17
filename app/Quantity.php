<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    //
    protected $guarded=[];
    protected $primaryKey = 'product_id';
    //protected $primaryKey = 'waist_id';
    public function waist()
    {
      return $this->belongsTo(Waist::class);
    }
/*
    public function brand()
    {
      return $this->belongsTo(Brand::class);
    }*/
}
