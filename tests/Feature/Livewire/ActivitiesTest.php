<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Activities;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ActivitiesTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Activities::class);

        $component->assertStatus(200);
    }
}
