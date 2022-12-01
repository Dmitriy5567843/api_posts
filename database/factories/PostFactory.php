<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * Class PostFactory.
 *
 * @package Database\Factories
 */
class PostFactory extends Factory
{
    /**
     * @var string model.
     */
    protected $model = Post::class;

    /**
     * Define data for generate post.
     *
     * @return array
     */
    public function definition(): array
    {

        $user = User::inRandomOrder()->first();

        return [
            'user_id' => $user ? $user->id : User::factory()->create()->id,
            'title' => $this->faker->jobTitle,
            'context' => $this->faker->realText,
        ];
    }
}
