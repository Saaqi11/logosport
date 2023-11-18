<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Contest extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get customer data
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    /**
     * Get style of contest
     * @return HasOne
     */
    public function style(): HasOne
    {
        return $this->hasOne(ContestStyle::class, "contest_id", "id");
    }

    /**
     * Get media types
     * @return HasMany
     */
    public function mediaFiles(): HasMany
    {
        return $this->hasMany(Media::class, "contest_id", "id");
    }

    /**
     * Get logo colors
     * @return HasMany
     */
    public function colors(): HasMany
    {
        return $this->hasMany(LogoColor::class, "contest_id", "id");
    }

    /**
     * get count
     */
    public function works()
    {
        return $this->hasMany(Work::class, "contest_id", "id");
    }

    public function designerWork()
    {
        return $this->hasOne(Work::class, 'contest_id', 'id')->where('designer_user_id', Auth::id());
    }

    public function winnerWork()
    {
        return $this->hasOne(Work::class, 'contest_id', 'id')->where('designer_user_id', Auth::id())->where("place", 1)->orWhere("place", 2)->orWhere("place", 3);
    }

    public function firstPosition()
    {
        return $this->hasMany(Work::class, "contest_id", "id")->where("place", 1);
    }

    public function secondPosition()
    {
        return $this->hasMany(Work::class, "contest_id", "id")->where("place", 2);
    }

    public function thirdPosition()
    {
        return $this->hasMany(Work::class, "contest_id", "id")->where("place", 3);
    }

    public function favorite()
    {
        return $this->hasMany(CustomerFavouriteWork::class, "contest_id", "id")->where("status", 1);
    }
}
