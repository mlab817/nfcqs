<?php

namespace Database\Factories;

use App\Models\SrcCommodity;
use Illuminate\Database\Eloquent\Factories\Factory;

class SrcCommodityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SrcCommodity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'commodity' => $this->faker->word,
            'crop_type' => $this->faker->randomElement(['Crop','Non-Crop']),
            'seed_ratio' => $this->faker->numberBetween(0,100) / 100,
        ];
    }
}
