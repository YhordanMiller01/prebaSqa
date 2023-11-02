<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Http\Livewire\Categories;
use App\Models\Category;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_render()
    {
        Livewire::test(Categories::class)
            ->assertStatus(200);

    }

    public function test_delete_register()
    {

        $data = Category::factory()->create(['name' => 'Testingaa the first water-proof hair dryer','slug' => 'test slug dataa']);
        Livewire::test(Categories::class)
        ->call('deleteRegister', $data->id)
        ->assertSessionHas('message', '');

    }

    public function test_validate_inputs()
    {

        Livewire::test(Categories::class)
        ->set('name', '')
        ->call('save')
        ->assertHasErrors('name');
    }


}
