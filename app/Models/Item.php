<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Item
 * @package App\Models
 * @property int id
 * @property string name
 * @property string register_number
 * @property int quantity
 * @property int category_id
 *
 * @property Category category
 */
class Item extends Model
{
    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
