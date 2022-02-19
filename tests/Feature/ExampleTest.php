<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertOk();

       $view = $this->view('welcome');

       $view->assertSee('Laravel has wonderful');

       $response->assertSeeText(" На этом сайте вы найдете много новостей", $escaped = true);
    }
}
