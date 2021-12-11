<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        User::unguard();

        User::create([
            'name' => '系統',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_super_admin' => true,
        ]);
    }
}
