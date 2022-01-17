<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(): array
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
        return $news;
    }

    public function showNewsById(int $id)
    {
        $news = $this->getNews();
        foreach ($news as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return null;
    }

    public function getCategories(): array
    {
        $category = [];
        $faker = Factory::create();
        for ($i = 1; $i <= 5; $i++) {
            $category[] = [
                'id' => $i,
                'title' => $faker->word
            ];
        }
        return $category;
    }
}
