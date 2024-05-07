<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title',
        'description'
    ];
}

