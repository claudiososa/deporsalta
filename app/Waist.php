<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waist extends Model
{
  protected $guarded=[];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function quantity()
    {
      return $this->hasMany(Quantity::class);
    }
  
}
