<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'image',
    ];

    /**
     * Получить товары артиста
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
