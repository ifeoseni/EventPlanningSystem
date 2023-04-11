<?php

namespace Database\Factories\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'parent_id' => Category::factory(),
            'lft' => $this->faker->randomNumber(),
            'rgt' => $this->faker->randomNumber(),
            'depth' => $this->faker->numberBetween(-10000, 10000),
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
        ];
    }
}
