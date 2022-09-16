<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    /**
     * Get the consumer stores for the branch.
     */
    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
