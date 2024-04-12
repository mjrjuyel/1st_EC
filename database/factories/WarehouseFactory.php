<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use carbon\carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warehouse>
 */
class WarehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'wh_name'=>fake()->name(),
            'wh_address'=>fake()->address(),
            'wh_phone'=>fake()->phoneNumber(),
            'wh_slug'=>'wh-'.uniqId(),
            'created_at'=>Carbon::now(),
        ];
    }
}
