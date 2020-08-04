<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,29)->create();

        App\User::create([
            'name'=>'ADM-Laravel',
            'email' => 'admin.laravel@example.com',
            'password' => bcrypt('password')
        ]);
    }
}
