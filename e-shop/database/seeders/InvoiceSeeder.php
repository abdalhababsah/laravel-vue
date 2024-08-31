<?php
namespace Database\Seeders;
use Illuminate\Support\Str;
use App\Models\Invoice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id');
        // $userAddressIds = DB::table('user_addresses')->pluck('id');
        foreach (range(1, 10) as $index) {
            DB::table('orders')->insert([
                'user_id' => $userIds->random(),
                'total_price' => rand(100, 1000), // Update to total_price
                'status' => 'pending',
                'session_id' => Str::random(10),
                'user_address_id' =>1, // Assuming you have user addresses
                'created_by' => $userIds->random(),
                'updated_by' => $userIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
