<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'artist_id',
        'name',
        'image',
        'external_link',
    ];

    /**
     * Получить артиста товара
     */
    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }
}
