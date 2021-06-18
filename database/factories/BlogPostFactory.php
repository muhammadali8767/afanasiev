<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3, 8), true);
        $txt = $this->realText(rand(1000, 4000));
        $is_published = rand(1, 5) > 1;

        return [
            'category_id' => rand(1, 11),
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'sxcerpt' => $this->text(rand(40, 100)),
            'content_raw' => $txt,
            'content_html' => $txt,
            'is_published' => $is_published,
            'published_at' => $is_published ? $this->faker->dateTimeBetween('-2 months', '-1 days') : null,
        ];
    }
}
