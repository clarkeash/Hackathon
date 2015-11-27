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
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the user that owns the ticket.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that the ticket belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
