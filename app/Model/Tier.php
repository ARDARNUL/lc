<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tier extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function moons()
    {
        return $this->hasMany(Moon::class);
    }
}
