<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::of($this->faker->sentence(rand(5, 10)))->rtrim('.'),
            'body' => $this->faker->paragraphs(rand(5, 10), true),
            'views' => rand(0, 10),
//            'answers_count' => rand(0, 10),
            'votes' => rand(-3, 10),
        ];
    }
}
