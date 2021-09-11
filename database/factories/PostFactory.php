<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::select('id')->first();
        $productSuffix = ['Sweater', 'Pants', 'Glasses', 'Hat', 'Socks'];
        $name = $this->faker->company() . ' ' . Arr::random($productSuffix);
        $mk = 'eat, sleep, write, code, repeat';
        return [
            'title' => $name,
            'slug' => Str::slug($name, '-'),
            'short_description' => $this->faker->text(150),
            'content' => $this->faker->realText(1000),
            'published' => 1,
            'meta_title' => $this->faker->title,
            'meta_description' => $this->faker->text(100),
            'meta_keywords' => $mk,
            'author' => $user
        ];
    }
}
