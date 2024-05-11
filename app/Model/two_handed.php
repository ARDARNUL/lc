<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class two_handed extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scrab()
    {
        return $this->belongsTo(Scrab::class);
    }
}
