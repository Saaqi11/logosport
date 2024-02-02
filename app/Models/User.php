<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function works(): HasMany
    {
        return $this->hasMany(Work::class, "designer_user_id", "id")->take(5);
    }

    public function getPositionWorks(): HasMany
    {
        return $this->hasMany(Work::class, "designer_user_id", "id")->whereIn('place', [1, 2, 3]);
    }

    public function firstPosition()
    {
        return $this->hasMany(Work::class, "designer_user_id", "id")->where('place', 1);
    }

    public function secondPosition()
    {
        return $this->hasMany(Work::class, "designer_user_id", "id")->where('place', 2);
    }

    public function thirdPosition()
    {
        return $this->hasMany(Work::class, "designer_user_id", "id")->where('place', 3);
    }

    /**
     * count all reactions
     * @return HasMany
     */
    public function reactions(): hasMany
    {
        return $this->hasMany(WorkReaction::class, "designer_user_id", "id");
    }

    public function contests()
    {
        return $this->belongsTo(Contest::class);
    }

    public function allContest()
    {
        return $this->hasMany(Contest::class);
    }

    public function finishedContest()
    {
        return $this->hasMany(Contest::class)->where('status', 4);
    }

    public function canceledContest()
    {
        return $this->hasMany(Contest::class)->where('status', 3);
    }

    public function activeContest()
    {
        return $this->hasMany(Contest::class)->where('status', '!=', 3)
            ->where('status', '!=', 4);
    }
}
