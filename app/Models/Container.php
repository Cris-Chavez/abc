<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    public function destination(){
        return $this->belongsTo(Destination::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
