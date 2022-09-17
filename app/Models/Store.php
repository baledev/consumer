<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'branch_id', 'place_id', 'name', 'latitude', 'longitude', 'address', 'map', 'phone'
    ];

    /**
     * Get the branch that owns the store.
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
