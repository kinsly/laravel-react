<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\FdCategory;
use App\Models\FdItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ShopController extends Controller
{
    public function index():Response
    {
        $items = FdItem::with('image')->with(
            ['carts' => function ($query) {
                $query->where('status', 'incomplete')->whereNull('fd_cart_items.deleted_at')->where('user_id', Auth::user()?->id);
            }]
        )->where('status', 1)->paginate(20);

        $categories = FdCategory::whereNull('parent_id')->get();
        return Inertia::render('Shop',[
            'items'=> $items,
            'categories' => $categories
        ]);
    }

    /*
    Display items based on selected category
    **/
    public function category(string $category_id, string $categoryName):Response
    {
        $items = FdItem::with('image')->where('status', 1)->where('fd_category_id',$category_id)->paginate(20);
        $categories = FdCategory::whereNull('parent_id')->get();
        return Inertia::render('Shop',[
            'items'=> $items,
            'categories' => $categories
        ]);
    }

    /*
     Sort items by Price
    **/
    public function price(int $price): Response
    {
        $items = FdItem::with('image')->where('status', 1)->where('unit_price','<=',$price)->orderBy('unit_price','desc')->paginate(20);
        $categories = FdCategory::whereNull('parent_id')->get();
        return Inertia::render('Shop',[
            'items'=> $items,
            'categories' => $categories,
            'price' => $price
        ]);
    }

    /*
     Sort items by Price
    **/
    public function search(string $keyword): Response
    {
        $items = FdItem::with('image')->where('status', 1)->where('title','like','%'.$keyword.'%')->orderBy('title','asc')->paginate(20);
        $categories = FdCategory::whereNull('parent_id')->get();
        return Inertia::render('Shop',[
            'items'=> $items,
            'categories' => $categories
        ]);
    }
}
