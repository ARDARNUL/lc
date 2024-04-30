<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'avatar',
        'healt',
        'quantity',
        'stun_id',
        'moons_id'
    ];

    public function moons()
    {
        return $this->belongsTo(Moon::class);
    }

    public function stun()
    {
        return $this->belongsTo(Stun::class);
    }
}
