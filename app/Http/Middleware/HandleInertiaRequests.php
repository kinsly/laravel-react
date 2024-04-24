<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $cart_item_quantity = 0;
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $user = User::with(['carts' => function($query){
                return $query->where('status','incomplete')->withCount('items');
            }])->find($user_id);
            $cart_item_quantity = $user->carts[0]->items_count;
        }

        
        
        
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
            'flash' => [
                'message' => fn () => $request->session()->get('message')
            ],
            'cart_item_quantity' => $cart_item_quantity
        ];
    }
}
