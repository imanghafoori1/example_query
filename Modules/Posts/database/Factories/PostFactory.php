<?php

namespace Modules\Posts\database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Posts\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the Post model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'user_id' => random_int(1, 100),
            'created_at' => (string) now()->subSeconds(random_int(1, 6 * 3600))->subDays(random_int(0, 8)),
        ];
    }
}
