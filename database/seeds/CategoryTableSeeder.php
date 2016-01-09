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
        Category::create(['id' => '1','name' => 'FERTILIZANTES']);
        Category::create(['id' => '2','name' => 'INSUMOS']);
        Category::create(['id' => '3','name' => 'MAQUINARIA Y EQUIPOS']);
        Category::create(['id' => '4','name' => 'LOGISTICA Y TRANSPORTE']);
        Category::create(['id' => '5','name' => 'SERVICIOS ESPECIALES']);
        Category::create(['id' => '6','name' => 'INSUMOS PECUARIOS']);
        Category::create(['id' => '7','name' => 'TECNOLOGIA AGRICOLA']);


    }
}
