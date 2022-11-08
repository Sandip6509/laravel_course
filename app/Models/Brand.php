<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // public function dealers()
    // {
    //     return $this->hasOne(Dealer::class);
    // }

    public function dealers()
    {
        return $this->hasMany(Dealer::class);
    }

    public function belongsToManyDealers()
    {
        return $this->belongsToMany(Dealer::class,'brands_dealers');
    }
}
