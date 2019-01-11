<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=[];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function products()
    {
      return $this->hasMany(Product::class);
    }

    public function productsCount()
    {
    return $this->hasMany(Product::class)
      ->select('category_id')
      ->selectRaw('COUNT(category_id) as total')
      ->groupBy('category_id');
    }
}
