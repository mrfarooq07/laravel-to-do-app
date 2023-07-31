<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Items as Item;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 20) as $range){
            Item::create([
                'name' => 'Foo ' . $range,
                'description' => 'Foo description ' . $range,
                'price' => $range * 10
            ]);
        }
    }
}
