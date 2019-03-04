<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class);
    } 
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function waist()
    {
        return $this->belongsTo(Wais::class);
    }
}
