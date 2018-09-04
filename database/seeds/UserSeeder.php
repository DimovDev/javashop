<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'hassan',
            'email' => 'hassan@gmail.com',
            'password' => '$2y$10$ItF4hU7eMjVnWIIKxrsfv.U/f0WyT229E5PgmIRp80L4CpwWYysSC',
            'status' =>1 // secret
        ]);

        User::create([
            'name' => 'ahmed',
            'email' => 'ahmed@ahmed.com',
            'password' => '$2y$10$ItF4hU7eMjVnWIIKxrsfv.U/f0WyT229E5PgmIRp80L4CpwWYysSC',
             'status' =>1 // secret
        ]);
    }
}
