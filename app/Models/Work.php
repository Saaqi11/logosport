<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Work extends Model
{
    use HasFactory;

    /**
     * get reactions
     * @return HasMany
     */
    public function reactions(): HasMany
    {
        return $this->hasMany(WorkReaction::class, "work_id", "id");
    }
}
