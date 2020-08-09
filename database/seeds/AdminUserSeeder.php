<?php

use Carbon\Carbon;
use App\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'role_id'    => 1,
            'name'       => 'Superadmin',
            'username'   => 'superadmin',
            'email'      => 'superadmin@example.com',
            'active'     => 1,
            'password'   => bcrypt('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
