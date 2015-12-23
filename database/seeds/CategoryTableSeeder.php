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
    public function run()
    {
        $this->createCategory();
    }
    private function createCategory(){
        Category::create(['name' => 'FERTILIZANTES']);
        Category::create(['name' => 'INSUMOS AGRÍCOLAS']);
    }
}
