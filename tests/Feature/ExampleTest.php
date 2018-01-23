<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Merodiro\Settings\Facades\Settings;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        Settings::set('name', 'Social network');

        $response = $this->get('/');

        $response->assertSee('Social network');

        $response->assertStatus(200);
    }
}
