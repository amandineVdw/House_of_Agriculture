<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\BookStack\PageService;
use Mockery;

class BookStackIntegrationTest extends TestCase
{
    /** @test */
    public function it_displays_bookstack_pages_list()
    {
        $mock = Mockery::mock(PageService::class);
        $mock->shouldReceive('getAllPages')->once()->andReturn(['data' => [['name' => 'Page Test', 'created_at' => now()]]]);

        $this->app->instance(PageService::class, $mock);

        $response = $this->actingAs(\App\Models\User::factory()->create())
            ->get(route('bookstack.pages.index'));

        $response->assertStatus(200)
                 ->assertSee('Page Test');
    }
}
