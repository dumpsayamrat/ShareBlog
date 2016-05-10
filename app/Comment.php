<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['author', 'comment', 'blog_id'];


    /**
     * Get the post that owns the comment.
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}