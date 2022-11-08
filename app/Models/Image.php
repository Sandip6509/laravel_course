<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table ='images';

    protected $primaryKey = 'id';

    public function imagable()
    {
        return $this->morphTo();
    }
}
