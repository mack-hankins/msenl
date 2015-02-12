<?php

use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('roles')->delete();

		$adminRole = new \Role;
		$adminRole->name = 'adminRole';
		$adminRole->save();

		$standRole = new \Role;
		$standRole->name = 'verifiedRole';
		$standRole->save();

		$modRole = new \Role;
		$modRole->name = 'modRole';
		$modRole->save();

		$user = \User::where('email','=',$_ENV['ADMIN_EMAIL'])->first();
		$user->attachRole( $adminRole );


	}
}
