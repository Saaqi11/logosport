<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinnerMediaFile extends Model
{
    use HasFactory;

    public function work()
    {
        return $this->hasOne(Work::class, "id", "work_id");

    }
}
