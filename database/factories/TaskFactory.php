<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::all()->random();

        return [
            'title' => $this->faker->text(30),
            'description' => $this->faker->text(50),
            'due_date' => $this->faker->dateTime(),
            'is_done' => $this->faker->boolean(),
            'category_id' => $category['id'],
            'user_id' => Category::find($category['id'])->user
        ];
    }
}
