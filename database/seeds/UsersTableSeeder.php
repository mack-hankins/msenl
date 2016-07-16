<?php

use Illuminate\Database\Seeder;
use Msenl\User;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->agent = env('ADMIN_AGENT');
        $user->email = env('ADMIN_EMAIL');
        $user->verified = 1;
        $user->verified_on = \Carbon\Carbon::now();
        $user->save();

        if (env('APP_ENV') == 'local') {
            factory(Msenl\User::class, 50)->create();
        }
    }
}
