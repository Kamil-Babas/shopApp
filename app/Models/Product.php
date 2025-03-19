<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'amount',
        'price',
        'image_path',
        'category_id'
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

}
