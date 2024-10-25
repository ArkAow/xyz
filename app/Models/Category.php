<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Get the tracks who belongs to that category.
     */
    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class, 'category_id');
    }
}
