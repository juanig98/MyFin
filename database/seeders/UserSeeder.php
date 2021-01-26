<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Trador',
            'email' => 'admin@email',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('abc.1234'),
            'phone' => '123456789',
            'role_id' => 6,
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Juan Ignacio Galarza',
            'email' => 'juan@email',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('abc.1234'),
            'phone' => '123456789',
            'role_id' => 5,
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Pedro Martinez',
            'email' => 'pedro@email',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('abc.1234'),
            'phone' => '123456789',
            'role_id' => 3,
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Santiago Baronetto',
            'email' => 'santiago@email',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('abc.1234'),
            'phone' => '123456789',
            'role_id' => 2,
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
