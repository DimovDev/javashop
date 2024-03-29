<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ProductSeeder::class);
         $this->call(AdminUserSeeder::class);
         $this->call(OrderItemSeeder::class);
         $this->call(OrderSeeder::class);
         $this->call(UserSeeder::class);
    }
}
