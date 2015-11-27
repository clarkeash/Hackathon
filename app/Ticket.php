<?php

namespace OVH;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * Get the comments for the ticket.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get the ticket that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
