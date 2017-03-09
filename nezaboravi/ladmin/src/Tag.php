<?php

namespace Nezaboravi\Ladmin;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
