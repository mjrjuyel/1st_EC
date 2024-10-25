<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PaymentGatewayBdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentGatewayBd::insert([
            'payment_name'=>'AmarPay',
            'store_id'=>'Amarpaytest',
            'signature_key'=>'dbb74894e82415a2f7ff0ec3a97e4183',
            'status'=>0,
            'created_at'=>Carbon::now(),
        ]);
    }
}
