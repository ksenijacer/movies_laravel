<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Movie;

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
            'image_url' => $this->faker->image(),
            'genre' => $this->faker->word(),
            'user_id' => User::inRandomOrder()->first(),
        ];
    }
}
