<?php

use App\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => User::ROLE_ADMINISTRATOR],
            ['name' => User::ROLE_WRITER],
            ['name' => User::ROLE_GENERAL],
        ]);
    }
}
