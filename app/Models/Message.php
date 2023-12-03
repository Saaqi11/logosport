<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Message extends Model
{
    use HasFactory;

    public function conversation(): HasOne
    {
        return $this->hasOne(Conversation::class, 'id', 'conversation_id'); // it should be BelongsTo
    }
}
