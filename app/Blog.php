<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog';

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}