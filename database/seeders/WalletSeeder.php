<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $juan = 2;
        $pedro = 3;
        $santiago = 4;

        DB::table('wallets')->insert([
            'id' => 1,
            'name' => 'Efectivo',
            'account_id' => $juan,
            'description' => "Valores en efectivo (moneda)",
            'origin' => "Peso argentino",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('wallets')->insert([
            'id' => 2,
            'name' => 'Banco Santander Río',
            'account_id' => $juan,
            'description' => "Cuenta bancaria",
            'origin' => "Banco",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('wallets')->insert([
            'id' => 3,
            'name' => 'Mercado Pago',
            'account_id' => $juan,
            'description' => "Valores en cuenta de Mercado Pago",
            'origin' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('wallets')->insert([
            'id' => 4,
            'name' => 'Efectivo',
            'account_id' => $pedro,
            'description' => "Valores en efectivo",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('wallets')->insert([
            'id' => 5,
            'name' => 'Banco Nación',
            'account_id' => $pedro,
            'description' => "Cuenta bancaria",
            'origin' => "Banco",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('wallets')->insert([
            'id' => 6,
            'name' => 'Efectivo',
            'account_id' => $santiago,
            'description' => "Valores en efectivo (moneda)",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('wallets')->insert([
            'id' => 7,
            'name' => 'Banco Macro',
            'account_id' => $santiago,
            'description' => "Cuenta bancaria",
            'origin' => "Banco",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
