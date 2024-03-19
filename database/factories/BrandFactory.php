<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'brand_title'=>fake()->name,
                'brand_pic'=>fake()->imageUrl($width = 640, $height = 480),
                'brand_slug'=>'brand-'.uniqId(),
                'brand_creator'=>1,
                'created_at'=>carbon::now(),
        ];
    }
}
