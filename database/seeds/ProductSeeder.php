<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Product::create([
            'name' => 'LENOVO prenosnik Yoga 900 13ISK',
            'price' => '2000',
            'descrption' => 'This is some text for the LENOVO prenosnik Yoga 900 13ISK',
            'image' => '2009918912.jpg',
        ]);

        Product::create([
            'name' => 'Macbook',
            'price' => '233',
            'descrption' => 'This is some text for the Macbook',
            'image' => '4647388301.jpg',
        ]);

        Product::create([
            'name' => 'Ployster Beg',
            'price' => '50',
            'descrption' => 'This is some text for the Ployster Beg',
            'image' => '3074556010_3.jpg',
        ]);

        Product::create([
            'name' => 'Samsung LED',
            'price' => '3000',
            'descrption' => 'This is some text for the Samsung LED',
            'image' => '6209985004_25.jpg',
        ]);
    }
}
