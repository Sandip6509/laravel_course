<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;

    public function brands()
    {
        return $this->belongsTo(Brand::class,'id');
    }


    public function belongsToManyBrands()
    {
        return $this->belongsToMany(Brand::class,'brands_dealers');
    }
}
