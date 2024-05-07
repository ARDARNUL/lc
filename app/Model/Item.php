<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'avatar',
        'type_id',
        'cost',
        'weight',
        'presence_of_battery_id',
        'conducts_electricity_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function presence_of_battery()
    {
        return $this->belongsTo(presence_of_battery::class);
    }

    public function conducts_electricity()
    {
        return $this->belongsTo(conducts_electricity::class);
    }
}
