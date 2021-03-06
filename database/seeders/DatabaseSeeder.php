<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AccountSeeder::class,
            BadgeSeeder::class,
            WalletSeeder::class,
            TransactionSeeder::class,
        ]);
        \App\Models\Transaction::factory(8)->create();
     //   \App\Models\User::factory(10)->create();
    }
}
