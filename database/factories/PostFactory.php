<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => "Titulo de um Post",
            'description' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, voluptas ipsam eligendi quasi eius tenetur reiciendis laudantium, dolore quidem optio quo excepturi, error cum similique est aliquam deserunt repellat nobis",
            'user_id' => 1
        ];
    }
}
