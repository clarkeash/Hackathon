<?php

namespace OVH;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the tickets for the category.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
