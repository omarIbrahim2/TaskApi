<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coursel>
 */
class CourselFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $bools = [0 , 1];
        $posts = Post::all()->pluck('id')->toArray();
        return [
            "id_ad" => $bools[rand(0 , count($bools) - 1)],
            'content' => $this->faker->text(50),
            'see_more' => $this->faker->text(30),
            'media' => "uploads/coursels/kwieo343jksj2323.jpg",
            "post_id" => $posts[rand(0 , count($posts) - 1)],

        ];
    }
}
