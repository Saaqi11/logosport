<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Work extends Model
{
    use HasFactory;

    /**
     * Get Reactions
     */
    public function reactions()
    {
        return $this->hasOne(WorkReaction::class, "id", "work_id" )
            ->select('work_reactions.count',DB::raw('sum(work_reactions.count) as totalLikes'))
            ->groupBy('count');
    }

    /**
     * Get Contest
     * @return HasOne
     */
    public function contest(): HasOne
    {
        return $this->hasOne(Contest::class, "contest_id", "id");
    }

    /**
     * Get Total Works
     * @return HasMany
     */
    public function totalWorks(): HasMany
    {
        return $this->hasMany(Work::class, "designer_user_id", "designer_user_id");
    }

    /**
     * Get Designer
     * @return HasOne
     */
    public function designer(): HasOne
    {
        return $this->hasOne(User::class, "id", "designer_user_id");
    }

    /**
     * Get Files
     * @return HasMany
     */
    public function files (): HasMany
    {
        return $this->hasMany(WorkMediaFile::class, "work_id", "id");
    }
}
