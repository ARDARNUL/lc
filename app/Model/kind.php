<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kind extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
