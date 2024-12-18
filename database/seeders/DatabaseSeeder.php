<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SeoSettingSeeder::class,
            PaymentGatewayBdSeeder::class,
            SocailMediaSeeder::class,
            ContactInformationSeeder::class,
        ]);
        // \App\Models\Brand::factory(200)->create();
        // \App\Models\Warehouse::factory(200)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
