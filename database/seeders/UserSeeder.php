<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create a new user
        //$user = new \App\Models\User();
        //  $user->name = 'Admin';
        //  $user->phone = '082133665917';
        //  $user->email = 'asmarinanurjanah0613@gmail.com';
        //  $user->password = bcrypt('admin1234');
        //  $user->save();

        //Create a multiple users
        $user = [
            [
                'name' => 'Admin',
                'phone' => '082133665917',
                'email' => 'asmarinanurjanah0613@gmail.com',
                'password' => bcrypt('admin1234'),
            ],
            [
                'name' => 'User',
                'phone' => '1234567890',
                'email' => 'asmarina0613@gmail.com',
                'password' => bcrypt('admin1234567890'),
            ],
        ];
        //insert the user into the database
        DB::table('users')->insert($user);
    }
}
