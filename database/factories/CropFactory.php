<?php

namespace Database\Factories;

use App\Models\Crop;
use App\Models\SrcCommodity;
use App\Models\SrcProvince;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CropFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Crop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $province = SrcProvince::factory()->create();
        $commodity = SrcCommodity::factory()->create();

        return [
            'user_id' => 1, // first user
            'src_province_id' => $province->id,
            'src_commodity_id' => $commodity->id,
            'conversion_rate' => $this->faker->numberBetween(0,100) / 100,
            'crop_data_filename' => $this->faker->sentence,
            'pop_data_filename' => $this->faker->sentence,
            'per_capita_consumption_kg_year' => $this->faker->numberBetween(0,100),
            'per_capita_year' => $this->faker->numberBetween(1987,2020),
            'remarks' => $this->faker->paragraph,
        ];
    }
}
