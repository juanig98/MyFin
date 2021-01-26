<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 6,
            'level_access' => 10,
            'name' => 'Administrator',
            'description' => 'The site administrator. It has access to all the available functionalities',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('roles')->insert([
            'id' => 5,
            'level_access' => 10,
            'name' => 'Developer',
            'description' => 'Site developer. It has access to all the available functionalities',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('roles')->insert([
            'id' => 4,
            'level_access' => 8,
            'name' => 'Management',
            'description' => 'Administer and manage site features. It does not have all the functionalities available',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'level_access' => 5,
            'name' => 'User Premium',
            'description' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'level_access' => 5,
            'name' => 'User Pro',
            'description' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('roles')->insert([
            'id' => 1,
            'level_access' => 1,
            'name' => 'User Basic',
            'description' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
