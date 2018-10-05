<?php

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
        //
        User::create([
            'name' => 'junior',
            'email' => 'jramcneil@gmail.com',
            'password' => bcrypt('123123')
        ]);
    }
}
