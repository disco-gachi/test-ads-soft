<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $method = rand(0, 1) ? 'firstNameMale' : 'firstNameFemale';
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[$this->faker->$method] = $this->faker->lastName;
        }

        return [
            'data' => $data,
            'access' => (string)rand(0, 1)
        ];
    }
}
