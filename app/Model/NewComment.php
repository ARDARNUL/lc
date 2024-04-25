<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewComment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'comment_id',
        'news_id',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function new()
    {
        return $this->benlongsTo(News::class);
    }
}
