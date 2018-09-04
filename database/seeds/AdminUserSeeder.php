<?php

use Illuminate\Database\Seeder;
use App\AdminUser;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AdminUser::create([
           'name' => 'hassan',
            'email' => 'hassan@gmail.com',
            'password' => '$2y$10$ItF4hU7eMjVnWIIKxrsfv.U/f0WyT229E5PgmIRp80L4CpwWYysSC' // secret
        ]);
    }
}
