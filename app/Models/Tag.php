<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    public function portfolioItems(): BelongsToMany
    {
        return $this->belongsToMany(
            PortfolioItem::class,
            'portfolio_items_tags',
            'tag_id',
            'portfolio_item_id'
            );
    }
}
