<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    public function cities()
    {
        return $this->hasOneThrough(
            City::class,
            State::class,
            'country_id',
            'state_id',
            'id',
            'id'
        );
    }

    public function multiplecities()
    {
        return $this->hasManyThrough(
            City::class,
            State::class,
            'country_id',
            'state_id',
            'id',
            'id'
        )->take(25);
    }
}
