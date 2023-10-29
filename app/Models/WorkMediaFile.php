<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkMediaFile extends Model
{
    use HasFactory;

    public function work()
    {
        return $this->belongsTo(Work::class);
    }


    /**
     * get favourite works of customer
     * @return
     */
    public function favWork()
    {
        return $this->hasOne(CustomerFavouriteWork::class);
    }
}
