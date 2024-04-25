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
        'description',
        'tier_id',
        'cost',
        'viable_weather'
    ];

    public function tier()
    {
        return $this->belongsTo(Tier::class);
    }
}
