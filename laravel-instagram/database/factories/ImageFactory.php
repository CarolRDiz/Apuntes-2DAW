<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usuario = User::all()->random()->id;
        return [
            "user_id" => $usuario,
            'image_path' => fake()->imageUrl(640, 480, 'animals', true),
            'description' => fake()->sentence()
        ];
    }
}
