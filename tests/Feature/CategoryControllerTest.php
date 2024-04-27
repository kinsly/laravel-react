<?php

namespace Tests\Feature;

use App\Models\FdCategory;
use App\Models\User;
use Database\Factories\UserFactory;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Testing CategoryController
 */
class CategoryControllerTest extends TestCase
{
    // use RefreshDatabase;
    
    
    /**
     * Testing category index page
     */
    public function test_index(): void
    {
        //Checking guest can view page.
        $response = $this->get(route('categories.index'));
        $response->assertStatus(302); //redirect to log in

        //Check Super admin view content page
        $user = User::factory()->create();
        $user->assignRole('Super Admin');
        $this->actingAs($user);
        
        $response = $this->get(route('categories.index'));
        $response->assertViewIs('pages.categories.index');
        $response->assertStatus(200);
    }

    /**
     * Testing viewing category create page
     */
    public function test_create():void
    {
        //Checking guest can view page.
        $response = $this->get(route('categories.create'));
        $response->assertStatus(302); //redirect to log in

        //Check Super admin can view content page
        $user = User::factory()->create();
        $user->assignRole('Super Admin');
        $this->actingAs($user);

        $response = $this->get(route('categories.create'));
        $response->assertViewIs('pages.categories.create');
        $response->assertStatus(200);
    }

    /**
     * Creating a new category
     */
    public function testStore():void
    {
        $data = [
            'name'=> fake()->name,
            'parent_id'=> null
        ];

        $response = $this->post(route('categories.store', $data));
        $response->assertStatus(302);

        //Creating a category by super admin
        $user = User::factory()->create()->assignRole('Super Admin');
        $this->actingAs($user);
        
        $response = $this->post(route('categories.store', $data));
        $response->assertRedirect(route('categories.index'));
        $this->assertDatabaseHas('fd_categories', [
            'name' => $data['name'],
            'parent_id' => null,
        ]);

    }

    /**
     *Editing created category
     */
    public function test_edit():void
    {
        //login as super Admin
        $user = User::factory()->create()->assignRole('Super Admin');
        $this->actingAs($user);

        $category = FdCategory::factory()->create();
        $response = $this->get(route('categories.edit',$category->id));
        $response->assertStatus(200)
                 ->assertViewIs('pages.categories.edit')
                 ->assertViewHas('parents');
        
    }

    /**
     * Test updating category item
     */
    public function test_update():void
    {
        //login as super Admin
        $user = User::factory()->create()->assignRole('Super Admin');
        $this->actingAs($user);

        $category = FdCategory::factory()->create();
        $data = [
            'name'=> fake()->name,
            'parent_id' => null,
        ];

        $response = $this->put(route('categories.update', $category->id), $data);
        $response->assertRedirect(route('categories.edit', $category->id));

        $this->assertDatabaseHas('fd_categories', [
            'id' => $category->id,
            'name' => $data['name'],
            'parent_id' => $data['parent_id']
        ]);

    }

    /**
     * Deleting a category item
     */
    public function test_destroy():void
    {
        //login as super Admin
        $user = User::factory()->create()->assignRole('Super Admin');
        $this->actingAs($user);

        $category = FdCategory::factory()->create();
        $response = $this->delete(route('categories.destroy', $category->id));
        $response->assertRedirect(route('categories.index'));
        $this->assertSoftDeleted('fd_categories', ['id' => $category->id]);

    }

}
