<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\FarmCategory;

class FarmCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FarmCategory::create(['name' => 'Tuberculos']);
        FarmCategory::create(['name' => 'Frutales']);
    }
}
