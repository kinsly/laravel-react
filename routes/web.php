<?php

// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\ProfileController;
// use Illuminate\Foundation\Application;
// use Illuminate\Routing\Route as RoutingRoute;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Template\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Template\BuyerLoginController;
use App\Http\Controllers\Template\BuyerRegisterController;
use App\Http\Controllers\Template\CartController;
use App\Http\Controllers\Template\ProfileController;
use App\Http\Controllers\Template\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Template Routes
Route::get('/', [IndexController::class,'index'])->name('home');
Route::post('/getCategoryItems/{category_id}', [IndexController::class,'getItemsByCategory'])->name('home.getItemsByCategory');

Route::get('/shop', [ShopController::class,'index'])->name('shop');
Route::get('/shop/category/{category_id}/{category_slug}', [ShopController::class,'category'])->name('shop-category');
Route::get('/shop/price/{price}', [ShopController::class,'price'])->name('shop.price');
Route::get('/shop/search/{name}', [ShopController::class,'search'])->name('shop.search');

Route::get('/checkout', [IndexController::class,'checkout'])->name('checkout');
Route::get('/testimonial', [IndexController::class,'testimonial'])->name('testimonial');
Route::get('/404', [IndexController::class,'notfound'])->name('notfound');
Route::get('/contact', [IndexController::class,'contactus'])->name('contact');
Route::get('/shop/{id}/{name}', [IndexController::class,'singleItem'])->name('singleItem');


Route::get('/buyer-login', [BuyerLoginController::class,'create'])->name('buyer.login');
Route::post('/buyer-login', [BuyerLoginController::class,'store'])->name('buyer.login');
Route::post('/buyer-logout', [BuyerLoginController::class,'destroy'])->name('buyer.logout');
Route::get('/buyer-registration', [BuyerRegisterController::class,'register'])->name('buyer.registration');
Route::post('/buyer-registration', [BuyerRegisterController::class,'storeRegister'])->name('buyer.storeRegister');

Route::get('/profile/edit', [ProfileController::class,'edit'])->name('profile.edit');
Route::patch('/profile/edit', [ProfileController::class,'update'])->name('profile.update');
Route::delete('/profile/destroy', [ProfileController::class,'destroy'])->name('profile.destroy');


Route::middleware('auth.buyer')->group(function () {
  Route::get('/cart', [CartController::class,'index'])->name('cart.index');
  Route::post('/cart', [CartController::class,'store'])->name('cart.store');
  Route::post('/cart/quantity', [CartController::class,'changeQuantity'])->name('cart.quantity');
  Route::delete('/cart/item/{item_id}', [CartController::class,'deleteItem'])->name('cart.removeItem');
});
// Admin Routes
Auth::routes();


Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [AdminController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
  Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
  ]);
  Route::resources(['categories' => CategoryController::class]);
  Route::resources(['items' => ItemsController::class]);

  Route::post('/image-upload',[ImageUploadController::class,'store'])->name('image-uload');
  Route::delete('/image-delete/{name}',[ImageUploadController::class,'destroy'])->name('image-delete');

});

