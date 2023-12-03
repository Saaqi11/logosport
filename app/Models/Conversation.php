<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Conversation extends Model
{
    use HasFactory;

    public function user1(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user1_id'); // it should be BelongsTo
    }

    public function user2(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user2_id'); // it should be BelongsTo
    }

    public function latestMessage()
    {
        return $this->hasOne(Message::class)->latest();
    }
}