<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminNewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNewsCreateAdminAvailable()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testCategoriesAdminCreateAvailable()
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
    }

    public function testCategoriesAdminAvailable()
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

    public function testAdminIndexView()
    {

        $view = $this->view('admin.news.index');

        $view->assertSee('Список новостей');

        $view->assertSee('Добавить новость');

    }

    public function testNewsAdminCreated()
    {
        $responseData = [
            'title' => 'Some title',
            'author' => 'Admin',
            'status' => 'DRAFT',
            'description' => 'Some text'
        ];
        $response = $this->post(route('admin.news.store'), $responseData);

        $response->assertJson($responseData);
        $response->assertStatus(200);
    }
}
