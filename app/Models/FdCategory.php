<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FdItem;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class FdCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'parent_id'
    ];

     // Automatically generate slug before creating a new category
     protected static function boot()
     {
         parent::boot();
 
         static::creating(function ($category) {
             $category->slug = Str::slug($category->name); 
         });
     }
     
    public function parent()
    {
        return $this->belongsTo(FdCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(FdCategory::class, 'parent_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(FdItem::class, 'fd_category_id');
    }

    // $categories = Category::with('children')->whereNull('parent_id')->get();

    // foreach ($categories as $category) {
    //     echo "Category: " . $category->name . "\n";
    //     echo "Subcategories:\n";
    //     foreach ($category->children as $subcategory) {
    //         echo "- " . $subcategory->name . "\n";
    //     }
    // }
}
