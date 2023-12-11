<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\ExampleModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Filament\Resources\ExampleModelResource\Pages\EditExampleModel;

class ExampleModelTest extends TestCase
{
    use RefreshDatabase;

    public function testCanEditResource()
    {
        $this->actingAs(User::factory()->create());

        $model = ExampleModel::create(['example_json' => fake()->words()]);

        $this->assertIsArray($model->example_json);

        Livewire::test(EditExampleModel::class, [
            'record' => $model->getRouteKey(),
        ])
            ->assertSuccessful()
            ->assertFormSet([
                //this assertion will fail due to null value
                'example_json' => array_map(fn ($value) => ['name' => $value], $model->example_json),
            ]);
    }
}
