<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @package App\Models\
 * @property int id
 * @property string name
 */
class Category extends Model
{
    /**
     * @return HasMany
     */
    public function category(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
