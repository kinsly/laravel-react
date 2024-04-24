<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\FdCategory;
use App\Models\FdItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller
{
    public function index():Response
    {
        $items = FdItem::with('image')->with(
            ['carts' => function ($query) {
                $query->where('status', 'incomplete')->whereNull('fd_cart_items.deleted_at')->where('user_id', Auth::user()?->id);
            }]
        )->where('status', 1)->orderByDesc('created_at')->paginate(8);

    
        $categories = FdCategory::whereNull('parent_id')->limit(3)->get();

        $bestSeller6 = FdItem::with('image')->with(
                            ['carts' => function ($query) {
                                $query->where('status', 'incomplete')->whereNull('fd_cart_items.deleted_at')->where('user_id', Auth::user()?->id);
                            }]
                        )->where('status', 1)->orderBy('created_at')->limit(6)->get();

        $nextBestSeller4 = FdItem::with('image')->with(
                            ['carts' => function ($query) {
                                $query->where('status', 'incomplete')->whereNull('fd_cart_items.deleted_at')->where('user_id', Auth::user()?->id);
                            }]
                        )->where('status', 1)->limit(4)->get();

        return Inertia::render('Index',[
            'items'=> $items,
            'categories' => $categories,
            'nextBestSeller4'=>$nextBestSeller4,
            'bestSeller6'=> $bestSeller6
        ]);
    }

    

    /**
     * Display single item.
     * @var id - Fruit item id
     * @var name - name is used to create user friendly urls for SEO
     */
    public function singleItem(string $id, $name):Response
    {
        $item = FdItem::with('image')->with(
                ['carts' => function ($query) {
                    $query->where('status', 'incomplete')->whereNull('fd_cart_items.deleted_at')->where('user_id', Auth::user()?->id);
                }]
            )->where('status', 1)->where('id', $id)->first();
        

        $baseQuery = FdItem::with('image')->with(
            ['carts' => function ($query) {
                $query->where('status', 'incomplete')->whereNull('fd_cart_items.deleted_at')->where('user_id', Auth::user()?->id);
            }]
        )->where('status', 1);

        // Sending random set of fruits as featured items.
        $featuredItems = $baseQuery->orderbyDesc("created_at")->limit(5)->get();
        
        // Sending fruit items of same category as related products
        $relatedItems = $baseQuery->where('fd_category_id', $item->fd_category_id)->limit(10)->get();

        $categories = FdCategory::whereNull('parent_id')->get();
        return Inertia::render('SingleItem',[
            'item'=>$item,
            'featuredItems' => $featuredItems,
            'relatedItems' => $relatedItems,
            'categories' => $categories
        ]);
    }


    
    public function checkout():Response
    {
        return Inertia::render('Checkout');
    }

    public function testimonial():Response
    {
        return Inertia::render('Testimonial');
    }

    public function notfound():Response
    {
        return Inertia::render('404');
    }

    public function contactus():Response
    {
        return Inertia::render('ContactUsPage');
    }

    /**
     * Send items filtered based on category for index page
     * @var category_id
     */
    public function getItemsByCategory(string $category_id)
    {
        $items = FdItem::with('image')->with(
            ['carts' => function ($query) {
                $query->where('status', 'incomplete')->whereNull('fd_cart_items.deleted_at')->where('user_id', Auth::user()?->id);
            }]
        )->where('status', 1);

        if($category_id == 0){
            $items =  $items->orderByDesc('created_at')->limit(10)->get();    
        }else{
            $items =  $items->where('fd_category_id',$category_id)->limit(5)->get();
        }
        
        return $items;
    }    
}

