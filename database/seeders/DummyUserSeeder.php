<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Operator',
                'email' => 'operator@gmail.com',
                'role' => 'admin',
                'password' =>bcrypt('123456')
            ],
            [   
                'name' => 'User',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' =>bcrypt('123456')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
