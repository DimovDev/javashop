<?php

use Illuminate\Database\Seeder;
use App\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         OrderItem::create([
            'order_id' => 1,
            'product_id' => 1,
            'quainty' => 2,
            'price' => 4000,
        ]);

        OrderItem::create([
            'order_id' => 2,
            'product_id' => 2,
            'quainty' => 1,
            'price' => 233,
        ]);

        OrderItem::create([
            'order_id' => 3,
            'product_id' => 3,
            'quainty' => 2,
            'price' => 100,
        ]);
    }
}
