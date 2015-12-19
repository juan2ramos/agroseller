<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function getModel()
    {
        return new Category();
    }

    public function getDummyData()
    {
        return [
            'name' => 'Duilio Palacios'
        ];
    }
}
