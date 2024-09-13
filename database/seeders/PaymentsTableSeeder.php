<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::insert([
            ['order_id' => 1, 'amount' => 199.99, 'status' => 'paid', 'type' => 'credit card'],
            ['order_id' => 2, 'amount' => 299.99, 'status' => 'paid', 'type' => 'paypal'],
        ]);
    }
}
