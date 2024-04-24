<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FdCategory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FdItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id','title', 'card_tag', 'card_info', 'unit_price','ratings','summary','description','isAvailable','fd_category_id','status'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(FdCategory::class, 'fd_category_id');
    }

    public function image():HasOne
    {
        return $this->hasOne(FdPicture::class,'fd_item_id');
    }

    public function carts():BelongsToMany
    {
        return $this->belongsToMany(FdCart::class, 'fd_cart_items')->withPivot('quantity');
    }
}
