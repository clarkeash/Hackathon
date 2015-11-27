<?php

namespace OVH;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Get the ticket that owns the comment.
     */
    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

    /**
     * Get all of the owning person models.
     */
    public function person()
    {
        return $this->morphTo();
    }
}
