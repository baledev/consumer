<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * Get the branch that owns the store.
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
