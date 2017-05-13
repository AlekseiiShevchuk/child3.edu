<?php

use Illuminate\Database\Seeder;

class CategotySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Птицы',],

        ];

        foreach ($items as $item) {
            \App\Categoty::create($item);
        }
    }
}
