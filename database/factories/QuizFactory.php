<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3,7));
        return [
            'title' => $title,
            'description' => $this->faker->text(200),
            'slug' => Str::slug($title),
        ];
    }
}
