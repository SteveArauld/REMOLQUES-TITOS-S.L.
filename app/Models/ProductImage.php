<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    protected $guarded = [];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /** URL publique réelle de l'image téléchargée. */
    public function getUrlAttribute(): ?string
    {
        return $this->path ? asset($this->path) : $this->src;
    }
}
