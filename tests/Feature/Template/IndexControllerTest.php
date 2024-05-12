<?php

namespace Tests\Feature\Template;

use App\Http\Controllers\Template\IndexController;
use App\Models\FdCart;
use App\Models\FdCartItem;
use App\Models\FdCategory;
use App\Models\FdItem;
use App\Models\FdPicture;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Assert;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia;

class IndexControllerTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        // Create a user and login
        $user = User::factory()->create();
        $this->actingAs($user);
        
        //Create empty cart for logged in user.
        $cart = FdCart::factory()->create(['user_id' => $user->id]);

        // Create 5 categories and add 3 fruit items for each category with a image
        FdCategory::factory(5)->create()->each(function($category) use ($cart){
            $items = FdItem::factory(3)->create(['fd_category_id'=> $category->id]);

            // Add random items to cart
            $randomItemCount = rand(0, count($items));
            $itemsToAdd = $items->random($randomItemCount);
            foreach($itemsToAdd as $item) {
                FdPicture::factory()->create(['fd_item_id' => $item->id]);
                FdCartItem::factory()->create([
                    'quantity'=> 1,
                    'fd_cart_id' => $cart->id,
                    'fd_item_id' => $item->id
                ]);
            }
            //Add image to all items
            foreach($items as $item) {
                FdPicture::factory()->create(['fd_item_id' => $item->id]);
            }
        });

        $response = $this->get(route('home'));

        // Assert that the response was successful
        $response->assertStatus(200);
        
        $response->assertInertia(function (AssertableInertia $page) use ($user){
            $page->component('Index')
                ->has('items')
                ->has('categories')
                ->has('nextBestSeller4')
                ->has('bestSeller6');
            
            if ($user) {
                $page->has('items.data');
            }

        });

        //bestSeller6 and nextBestSeller4 items are not test due to dummy data. Those will be implemented 
        //once bestSelling table and logic was created.
    }

    /**
     * Testing singleItem function of IndexController
     * Viewing fruit item
     */
    public function test_single_item():void
    {
        // Create a user and login
        $user = User::factory()->create();
        $this->actingAs($user);

        /** @var App/Models/FdItem */
        $pageItem = null;

        // Create one categories and add one fruit item for for that category with a image
        FdCategory::factory()->create()->each(function($category) use (&$pageItem){
            FdItem::factory()->create(['fd_category_id'=> $category->id])->each(function ($item) use (&$pageItem) {
                FdPicture::factory()->create(['fd_item_id' => $item->id]);
                $pageItem = $item;
            });

            // Creating 6 items of same category to display relavent items
            FdItem::factory(6)->create(['fd_category_id'=> $category->id])->each(function ($item) {
                FdPicture::factory()->create(['fd_item_id' => $item->id]);
            });
        });

        $response = $this->get(route('singleItem',[$pageItem->id, $pageItem->title]));
        
        // Assert that the response was successful
        $response->assertStatus(200);

        $response->assertInertia(function (AssertableInertia $page) use ($pageItem){
            $page->component("SingleItem")
                ->where('item.id',$pageItem->id)
                ->where('item.title',$pageItem->title)
                ->has('relatedItems',7);
        });
    }

    public function test_get_items_by_category():void
    {
        // Create a user and login
        $user = User::factory()->create();
        $this->actingAs($user);

        /** @var App/Models/fdCategory  */
        $category_data = null;

        //Creating one category and add 10 items to it
        FdCategory::factory()->create()->each(function($category) use (&$category_data){
            $category_data = $category;
            FdItem::factory(10)->create(['fd_category_id'=> $category->id])->each(function($item){
                FdPicture::factory()->create(['fd_item_id' => $item->id]);
            });
        });

        $response = $this->get(route('shop-category',[ $category_data->id,  $category_data->slug]));
        $response->assertStatus(200);

        $response->assertInertia(function(AssertableInertia $page) use ($category_data){
            $page   
                ->has('items.data',10)
                ->has('items.data.0.fd_category_id');
        });

    }
}
