<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->firstName(),
            'lastname'=>$this->faker->lastName(),
            'email'=>$this->faker->email,
            'created_at'=>$this->faker->dateTime,
            'updated_at'=>$this->faker->dateTime
        ];
    }
}
