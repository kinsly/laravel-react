<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\FdCart;
use App\Models\FdCartItem;
use App\Models\FdItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

use function Psy\debug;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():Response
    {

        
        $cart = FdCart::with(['items'=> function($query){
            $query->with(['item' => function($query2){
                $query2->with('image');
            }]);
        }])->
        where('status', 'incomplete')->where('user_id', Auth::user()->id)->first();
        //Auth::user()->carts()->where('status', 'incomplete')->first();
        return Inertia::render('Cart', [
            'cart' => $cart
        ]);
    }



    /**
     * Store a item in the cart.
     */
    public function store(Request $request):RedirectResponse 
    {
        
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $quantity = $request->quantity;
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $cart = $user->carts()->where('status', 'incomplete')->first();
        if (!$cart) {
            // $cart =  Auth::user()->carts()->create(['status' => 'incomplete']);
            $cart = FdCart::create(['status' => 'incomplete','user_id' => Auth::user()->id]);
        }

        $fdItem = FdItem::find($request->id);
        if (!$fdItem) {
            // Handle product not found error
            abort(403, 'invalid item passed');
        }
    
        // Check if the item already exists in the cart
        $cartItem = $cart->items()->where('fd_item_id', $request->id)->first();
    
        if ($cartItem) {
            // If item exists,do nothing
          
        } else {
           
            // If item does not exist, create a new cart item
            // $cartItem = new FdCartItem(['quantity' => $quantity]);
            $cartItem = new FdCartItem(['quantity' => $quantity]);
            $cartItem->item()->associate($fdItem);
            $cart->items()->save($cartItem);
        }  
        
        return back();

    }

    /**
     * Change quantity of a item in a cart
     */
    public function changeQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',//cart item id
            'order' => 'required|string'
        ]);

        // Check if the item already exists in the cart
        $cartItem = FdCartItem::find($request->id);
        if($cartItem){
            if($request->order == 'minus'){
                if($cartItem->quantity > 1) $cartItem->quantity = $cartItem->quantity-1;
            }else{
                $cartItem->quantity = $cartItem->quantity+1;
            }
            
            $cartItem->save();
        }
        

    }



    /**
     * Remove the specified resource from storage.
     */
    public function deleteItem(string $id): RedirectResponse
    {
        FdCartItem::destroy($id);
        return back();
    }
}
