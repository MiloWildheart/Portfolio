<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['name', 'color'];

    public function portfolioItems(): BelongsToMany
    {
        return $this->belongsToMany(
            PortfolioItem::class,
            'portfolio_items_tags',
            'tag_id',
            'portfolio_item_id'
            );
    }

    /**
     * Retrieves the name of the route key used by the model.
     *
     * @return string The name of the route key.
     */
    public function getRouteKeyName()
    {
        return 'id'; // or whatever field you want to use as the key
    }

    public static function getColorOptions()
    {
        return [
            '#FFABAB' => 'Red',
            '#BFFCC6' => 'Green',
            '#FFFFD1' => 'yellow',
            '#85E3FF' => 'Blue',
            '#A79AFF' => 'purple',
            '#FF9CEE' => 'Pink',
        ];
    }

}
