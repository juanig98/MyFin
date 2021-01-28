<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'date' => Carbon::create(2021, 1, 5),
            'title' => 'Cobro sueldo',
            'description' => 'Cobro mes de diciembre - Trabajo 1',
            'wallet_id' => 1, // Efectivo
            'badge_id' => 1, // PESO ARG
            'account_id' => 2, // Cuenta de Juan Ignacio Galarza
            'type' => 'Input', //
            'modality' => 'Permanent', //
            'amount' => 10000.00, //
            'created_at' => Carbon::create(2021, 1, 5), //
            'updated_at' => Carbon::create(2021, 1, 5), //
        ]);

        DB::table('transactions')->insert([
            'date' => Carbon::create(2021, 1, 15),
            'title' => 'Cobro sueldo',
            'description' => 'Cobro mes de diciembre - Trabajo 2',
            'wallet_id' => 2, // Santander Río
            'badge_id' => 1, // PESO ARG
            'account_id' => 2, // Cuenta de Juan Ignacio Galarza
            'type' => 'Input', //
            'modality' => 'Permanent', //
            'amount' => 12000.00, //
            'created_at' => Carbon::create(2021, 1, 15), //
            'updated_at' => Carbon::create(2021, 1, 15), //
        ]);

        DB::table('transactions')->insert([
            'date' => Carbon::create(2021, 1, 15),
            'title' => 'Deposito en cuenta',
            'description' => null,
            'wallet_id' => 2, // Santander Río
            'wallet_origin' => 1, // Efectivo
            'badge_id' => 1, // PESO ARG
            'account_id' => 2, // Cuenta de Juan Ignacio Galarza
            'type' => 'Transfer', //
            'modality' => 'Common', //
            'amount' => 5000.00, //
            'created_at' => Carbon::create(2021, 1, 15), //
            'updated_at' => Carbon::create(2021, 1, 15), //
        ]);
    }
}
