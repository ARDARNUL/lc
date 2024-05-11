<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tier extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title'
    ];

    public function moons()
    {
        return $this->hasMany(Moon::class);
    }
}
