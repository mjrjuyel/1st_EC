<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInformation::insert([
            'ci_phone1'=>"01754183203",
            'ci_email1'=>"mjrjuyel@gmail.com",
            'ci_address'=>"17 Princess Road, London",
            'ci_creator'=>1,
            'created_at'=>Carbon::now(),
        ]);
    }
}
