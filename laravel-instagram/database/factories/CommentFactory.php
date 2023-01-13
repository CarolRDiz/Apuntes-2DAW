<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usuario = User::all()->random()->id;
        $img = Image::all()->random()->id;
        return [
            "content" => fake()->sentence(),
            "user_id" => $usuario,
            'image_id' => $img,
        ];
    }
}
