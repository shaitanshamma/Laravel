<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsWithCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_with_categories')->insert([
            'news_id' => rand(1,10),
            'category_id' => rand(1,10)
        ]);
    }
}
