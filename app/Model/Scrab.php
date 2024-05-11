<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scrab extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'avatar',
        'min_cost',
        'max_cost',
        'weight',
        'conducts_electricity_id',
        'two_handed_id'
    ];

    public function conducts_electricity()
    {
        return $this->belongsTo(conducts_electricity::class);
    }

    public function two_handed()
    {
        return $this->belongsTo(two_handed::class);
    }

}
