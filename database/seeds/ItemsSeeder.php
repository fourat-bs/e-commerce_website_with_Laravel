<?php

use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'plat1',
            'description' => 'description',
            'photo' => 'images/55.jpeg',
            'price' => 20.00
        ]);
         DB::table('items')->insert([
            'name' => 'plat2',
            'description' => 'description',
            'photo' => 'images/51.jpeg',
            'price' => 20.00
        ]);
          DB::table('items')->insert([
            'name' => 'plat3',
            'description' => 'description',
            'photo' => 'images/55.jpeg',
            'price' => 20.00
        ]);
           DB::table('items')->insert([
            'name' => 'plat4',
            'description' => 'description',
            'photo' => 'images/42.jpeg',
            'price' => 20.00
        ]);
    }
}
