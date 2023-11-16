<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerFavouriteWork extends Model
{
    use HasFactory;

    public function files (): HasMany
    {
        return $this->hasMany(WorkMediaFile::class, "id", "work_media_file_id");
    }
}
