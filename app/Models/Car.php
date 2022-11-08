<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey= 'id';

    // public $incrementing = false;

    // protected $keyType = 'string';

    // public const CREATED_AT = 'new_created_at';
    // public const UPDATED_AT = 'new_updated_at';

    // protected $attributes = [
    //     'car_type'=>'Sedan'
    // ];

    // protected $fillable =[
    //     'user_id',
    //     'car_type',
    //     'contact'
    // ];

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
