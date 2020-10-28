<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        	'name'->'tarun',
        	'email'->'tarun@gmail.com',
        	'password'->1234567890,
        ]);
    }
}
