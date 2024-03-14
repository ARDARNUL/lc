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
        'description',
        'img',
        'healt',
        'stunnable'
    ];
}
