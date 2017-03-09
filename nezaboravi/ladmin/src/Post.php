<?php

namespace Nezaboravi\Ladmin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @package Ladmin
 */
class Post extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['keywords', 'description', 'tags', 'title', 'body', 'featured_photo', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
