<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            1 => 'Fruits & Vegetables',
            2 => 'Meat & Seafood',
            3 => 'Dairy & Eggs',
            4 => 'Bakery & Pastries',
            5 => 'Beverages',
        ];


        $categoryId = $this->faker->numberBetween(1, count($categories));


        $productsByCategory = [
            1 => ['Apple', 'Banana', 'Carrot', 'Lettuce', 'Tomato'],
            2 => ['Chicken Breast', 'Salmon', 'Beef Steak', 'Shrimp', 'Lamb Chops'],
            3 => ['Milk', 'Cheese', 'Yogurt', 'Butter', 'Eggs'],
            4 => ['Croissant', 'Baguette', 'Donut', 'Brownie', 'Muffin'],
            5 => ['Orange Juice', 'Coffee', 'Green Tea', 'Cola', 'Mineral Water'],
        ];

        return [
            'name' => $this->faker->randomElement($productsByCategory[$categoryId]),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'category_id' => $categoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
