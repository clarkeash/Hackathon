<?php

namespace OVH;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The default attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'open'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['subject', 'category_id', 'user_id'];

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
