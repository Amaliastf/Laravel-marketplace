<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'no_invoice' => 'INV123456',
                'user_id' => 1,
                'product_id' => 1,
                'admin_fee' => 1000.00,
                'kode_unik' => 123,
                'total' => 50000.00,
                'metode_pembayaran' => 'transfer',
                'status' => 'UNPAID',
                'expired_at' => Carbon::now()->addDays(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'no_invoice' => 'INV123457',
                'user_id' => 2,
                'product_id' => 2,
                'admin_fee' => 1500.00,
                'kode_unik' => 456,
                'total' => 75000.00,
                'metode_pembayaran' => 'credit card',
                'status' => 'UNPAID',
                'expired_at' => Carbon::now()->addDays(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'no_invoice' => 'INV123458',
                'user_id' => 1,
                'product_id' => 2,
                'admin_fee' => 1500.00,
                'kode_unik' => 456,
                'total' => 75000.00,
                'metode_pembayaran' => 'credit card',
                'status' => 'UNPAID',
                'expired_at' => Carbon::now()->addDays(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
