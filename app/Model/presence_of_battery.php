<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presence_of_battery extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function scrab()
    {
        return $this->belongsTo(Scrab::class);
    }


}
