<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
