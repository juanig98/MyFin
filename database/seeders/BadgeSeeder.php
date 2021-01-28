<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badges')->insert([
            'id' => 1,  
            'name' => 'Peso argentino',
            'symbol' => '$',
            'shot_name' => 'PES',
            'origin' => 'Argentina',
            'description' => null,
            'observations' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('badges')->insert([
            'name' => 'Dólar estadounidense',
            'symbol' => 'U$S',
            'shot_name' => 'USD',
            'origin' => 'Argentina',
            'description' => null,
            'observations' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('badges')->insert([
            'name' => 'Bitcoin',
            'symbol' => 'BTC',
            'shot_name' => 'BTC',
            'origin' => 'Criptomoneda',
            'description' => null,
            'observations' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('badges')->insert([
            'name' => 'Ethereum',
            'symbol' => 'ETH',
            'shot_name' => 'ETH',
            'origin' => 'Criptomoneda',
            'description' => null,
            'observations' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
