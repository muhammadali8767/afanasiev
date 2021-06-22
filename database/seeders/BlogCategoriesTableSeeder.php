<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cNane = 'Без категории';
        $categories[] = [
            'title' => $cNane,
            'slug' => \Str::slug($cNane),
            'parent_id' => 0,
        ];

        for ($i=1; $i <= 10; $i++) { 
            $cNane = 'Категоря #'.$i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
            'title' => $cNane,
            'slug' => \Str::slug($cNane),
            'parent_id' => $parentId,
            ];
        }

        \DB::table('blog_categories')->insert($categories);

    }
}
