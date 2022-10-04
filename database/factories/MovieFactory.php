<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Movie;
use App\Models\Genres;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->word(),
            'image_url' => $this->faker->imageUrl(),
            'user_id' => User::inRandomOrder()->first(),
        ];
    }
}
