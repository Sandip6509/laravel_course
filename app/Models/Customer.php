<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $primaryKey= 'id';

    public function image()
    {
        return $this->morphOne(Image::class,'imagable');
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imagable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }
}
