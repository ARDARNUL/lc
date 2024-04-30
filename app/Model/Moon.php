<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moon extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'avatar',
        'tier_id',
        'cost',
        'number_of_items',
        'weather'
    ];

    public function tier()
    {
        return $this->belongsTo(Tier::class);
    }

    public function Monster()
    {
        return $this->hasMany(Monster::class);
    }
}
