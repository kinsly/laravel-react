<?php

namespace Tests\Feature;

use App\Models\FdCategory;
use App\Models\FdItem;
use App\Models\FdPicture;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        //check admin can view 
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);
        $response = $this->get(route('items.index'));
        $response->assertViewIs('pages.items.index');
        $response->assertStatus(200);
    }

    /**
     * Show item creating page
     */
    public function test_create():void
    {
        //check admin can view 
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        $response = $this->get(route('items.create'));
        $response->assertViewIs('pages.items.create');
        $response->assertStatus(200);
    }

    /**
     * store item
     */
    public function test_store():void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);
        $category = FdCategory::factory()->create();
        
        $data = [
            'title' => fake()->name(), 
            'card_tag' => fake()->word(), 
            'card_info' => fake()->sentence(2, true), 
            'unit_price' => fake()->randomFloat(2, 5, 150),
            'ratings' => fake()->numberBetween(1,5),
            'summary' => fake()->paragraph(3, true),
            'description' => fake()->paragraphs(3, true),
            'isAvailable' => fake()->boolean(),
            'status' => true,
            'fd_category_id'=> $category->id,
            'imagePath' => fake()->imageUrl(640, 480, 'animals', true)
        ];
        $response = $this->post(route('items.store', $data));
        $response->assertRedirect(route('items.index'));
        
    }

    /**
     * Check admin can view item
     */
    public function test_view():void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        $item = FdItem::factory()->create();


        $response = $this->get(route('items.show', $item->id));
        $response->assertStatus(200)
                ->assertViewIs('pages.items.show');
    }

    /**
     * Show item edit page for admin
     */
    public function test_edit():void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        $item = FdItem::factory()->create();  
        $response = $this->get(route('items.edit',$item->id));
        $response->assertViewIs('pages.items.edit')
                 ->assertStatus(200)
                 ->assertViewHas('categories');   
    }

    /**
     * Admin updating a item
     */

     public function test_update():void
     {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        $newCategory = FdCategory::factory()->create();
        $item = FdItem::factory()->create();
        $data = [
            'title' => fake()->name(), 
            'card_tag' => fake()->word(), 
            'card_info' => fake()->sentence(2, true), 
            'unit_price' => fake()->randomFloat(2, 5, 150),
            'ratings' => fake()->numberBetween(1,5),
            'summary' => fake()->paragraph(3, true),
            'description' => fake()->paragraphs(3, true),
            'isAvailable' => fake()->numberBetween(0,1),
            'status' => 1,
            'fd_category_id'=> $newCategory->id,
            'imagePath' => fake()->imageUrl(640, 480, 'animals', true)
        ];
        
        $response = $this->put(route('items.update', $item->id), $data);
        // var_dump($response);
        $response->assertRedirect(route('items.edit', $item->id));
        
        $this->assertDatabaseHas('fd_items', [
            'id' => $item->id,
            'title' => $data['title'], 
            'card_tag' => $data['card_tag'],
            'card_info' => $data['card_info'],
            'unit_price' => $data['unit_price'],
            'ratings' => $data['ratings'],
            'summary' => $data['summary'],
            'fd_category_id'=> $data['fd_category_id'],
            'description' => $data['description'],
            'isAvailable' => $data['isAvailable'],
            'status' => $data['status'],
        ]);

        $this->assertDatabaseHas('fd_pictures', [
            'url' => $data['imagePath'], 
        ]);

     }

     /** Deleting item by admin */
     public function test_delete():void
     {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        $item = FdItem::factory()->create();
        $response = $this->delete(route('items.destroy', $item->id));
        $response->assertRedirect(route('items.index'));

        $this->assertSoftDeleted('fd_items', [
            'id' => $item->id
        ]);
     }


}
