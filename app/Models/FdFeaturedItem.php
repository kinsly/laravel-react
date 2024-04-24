<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FdItem;

class FdFeaturedItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fd_item_id',
    ];

    public function item()
    {
        return $this->hasOne(FdItem::class);
    }
}
