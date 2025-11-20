<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {

        // Создаем массив с моделями, к которым может относиться комментарий
        $commentableModels = [
            Post::class,
        ];

        // Выбираем случайную модель
        $commentableType = $this->faker->randomElement($commentableModels);
        // Получаем случайный ID выбранной модели
        $commentableId = $commentableType::inRandomOrder()->first()->id;

        return [
            'content' => $this->faker->realText(),
            'date' => $this->faker->dateTime(),
//            'post_id' => Post::inRandomOrder()->first()->id,
            'profile_id' => Profile::inRandomOrder()->first()->id,
            'commentable_type' => $commentableType,
            'commentable_id' => $commentableId,
        ];
    }
}
