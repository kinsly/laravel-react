<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * This is a Pivot table for fd_items and fd_carts. 
 */
class FdCartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id','quantity'
    ];

    public function cart():BelongsTo
    {
        return $this->BelongsTo(FdCart::class,'fd_cart_id');
    }

    public function item():BelongsTo
    {
        return $this->belongsTo(FdItem::class, 'fd_item_id');
    }
}
