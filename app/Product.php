<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];

    public function brand()
    {
      return $this->belongsTo(Brand::class);
    }

    public function colour()
    {
      return $this->belongsTo(Colour::class);
    }

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function productprice()
    {
      return $this->hasMany(Productprice::class)->orderBy('price_sale','desc');
    }

    public function productpriceUnico()
    {
      return $this->hasMany(Productprice::class)->orderBy('price_sale','desc');
    }

   

    // public function sale()
    // {
    //   return $this->belongsTo(Sale::class);
    // }


    public function picture()
    {
        return $this->hasMany(Picture::class);
    }

    public function quantity()
    {
      return $this->hasMany(Quantity::class);
    }

    public function quantity2()
    {
      return $this->hasMany(Quantity::class);
    }

    public function quantitySum()
    {
    return $this->hasMany(Quantity::class)
      ->select('product_id')
      ->selectRaw('SUM(quantity) as total')
      ->groupBy('product_id');
    }

}
