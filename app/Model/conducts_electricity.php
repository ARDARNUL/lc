<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conducts_electricity extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
