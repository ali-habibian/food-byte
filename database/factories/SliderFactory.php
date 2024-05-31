<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => '/uploads/test.jpg',
            'offer' => $this->faker->numberBetween(0, 100) . '%',
            'title' => $this->faker->sentence(),
            'sub_title' => $this->faker->sentence(10),
            'short_description' => $this->faker->paragraph(2),
            'button_link' => $this->faker->url(),
            'status' => $this->faker->boolean(),
        ];
    }
}
