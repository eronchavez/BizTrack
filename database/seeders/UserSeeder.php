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
        DB::table('users')->insert(

                [
                    [
                        'name' => 'Aaron Chavez',
                        'email' => 'eronadmin@gmail.com' ,
                        'password' => bcrypt('admin123') , 
                        'roles_id' => 1
                        
                    ],

                    [
                        'name' => 'Donna Chavez',
                        'email' => 'donnamanager@gmail.com' ,
                        'password' => bcrypt('manager123') , 
                        'roles_id' => 2
                    ]

                ]
        );
    }
}
