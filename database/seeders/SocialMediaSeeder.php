<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocailMedia::insert([
            'sm_facebook'=>"fab fa-facebook-f",
            'sm_youtube'=>'fab fa-youtube',
            'sm_creator'=>1,
            'created_at'=>Carbon::now(),
        ]);
    }
}
