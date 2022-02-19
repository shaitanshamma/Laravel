<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testWhenGetNewsPathThenStatusOk()
    {
        $response = $this->get('/news');

        $response->assertOk();
    }

    public function testWhenGetNewsPathThenResponseOk()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function testNewsView()
    {
        $news = [];
        $faker = Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            $news[] = [
                'id' => $i,
                'title' => $faker->word,
                'description' => $faker->text(73),
                'author' => $faker->name,
                'date' => now('Europe/Moscow')
            ];
        }

        $view = $this->view('news.index', ['newsList'=>$news]);

        $view->assertSee('Список новостей');

        $view->assertSee('Смотреть подробнее');

    }

    public function testWhenGetNewsByIdThenResponseOk()
    {
        $response = $this->get(route('news.show', ['id' => mt_rand(1, 10)]));

        $response->assertStatus(200);
    }

}
