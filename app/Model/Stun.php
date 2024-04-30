<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stun extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function monster()
    {
        return $this->belongsTo(Monster::class);
    }
}
