<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class FdCart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id','status', 'user_id'
    ];

    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class,'user_id');
    }

    public function items()
    {
        return $this->hasMany(FdCartItem::class, 'fd_cart_id');
    }
    
   

}
