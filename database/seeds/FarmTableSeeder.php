<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\Farm;

class FarmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Farm::create(['name' => 'papa', 'farm_category_id' => 1]);
        Farm::create(['name' => 'yuca', 'farm_category_id' => 1]);

        Farm::create(['name' => 'piña', 'farm_category_id' => 2]);
        Farm::create(['name' => 'papaya', 'farm_category_id' => 2]);
        Farm::create(['name' => 'banano', 'farm_category_id' => 2]);

        /*Farm::create(['name' => 'caña panelera', 'farm_category_id' => '']);
        Farm::create(['name' => 'caña de azucar', 'description' => '']);
        Farm::create(['name' => 'café', 'description' => '']);
        Farm::create(['name' => 'palma de aceite', 'description' => '']);
        Farm::create(['name' => 'cacao', 'description' => '']);
        Farm::create(['name' => 'platano', 'description' => '']);
        Farm::create(['name' => 'arroz', 'description' => '']);
        Farm::create(['name' => 'maiz blanco', 'description' => '']);
        Farm::create(['name' => 'maiz amarillo', 'description' => '']);

        Farm::create(['name' => 'aguacate', 'description' => '']);
        Farm::create(['name' => 'Hortalizas verduras y legunbre', 'description' => '']);
        Farm::create(['name' => 'plantas aromáticas condimentarias y medicinales', 'description' => '']);
        Farm::create(['name' => 'Plantaciones  forestales', 'description' => '']);
        Farm::create(['name' => 'cultivo de flores', 'description' => '']);
        Farm::create(['name' => 'producción de leche', 'description' => '']);
        Farm::create(['name' => 'producción de cerdos', 'description' => '']);
        Farm::create(['name' => 'producción bovina', 'description' => '']);
        Farm::create(['name' => 'equinos', 'description' => '']);
        Farm::create(['name' => 'porcinos', 'description' => '']);
        Farm::create(['name' => 'acuicola', 'description' => '']);
        Farm::create(['name' => 'Caña panelera', 'description' => '']);*/
    }
}
