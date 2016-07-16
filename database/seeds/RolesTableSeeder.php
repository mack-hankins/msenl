<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Msenl\Role;
use Msenl\User;

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->save();

        $user = User::where('email', '=', $_ENV['ADMIN_EMAIL'])->first();
        $user->attachRole($adminRole);
    }
}
