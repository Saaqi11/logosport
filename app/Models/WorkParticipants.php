<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkParticipants extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contest() {
        return $this->belongsTo(Contest::class);
    }

    public function activeContest() {
        return $this->hasOne(Contest::class, "id", "contest_id")->where("status","<", 4);
    }

    public function finishContest() {
        return $this->hasOne(Contest::class, "id", "contest_id")->where("status", 4);
    }

    public function winnerContest() {
        return $this->belongsTo(Contest::class)->where("status", 4);
    }
}
