<?php

namespace OVH;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * Get all of the staffs comments
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'person');
    }
}
