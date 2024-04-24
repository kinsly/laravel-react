<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FdItem;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FdPicture extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id','url','alt','thumbnail_url','fd_item_id'
    ];

    public function item():HasOne
    {
        return $this->hasOne(FdItem::class,'fd_item_id');
    }
   

}
