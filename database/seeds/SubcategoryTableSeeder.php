<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\Subcategory;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createSubcategory();
    }
    private function createSubcategory(){
        Subcategory::create(['name' => 'Abonos','categories_id' => '1']);
        Subcategory::create(['name' => 'Orgánicos','categories_id' => '1']);
        Subcategory::create(['name' => 'Fertilizantes','categories_id' => '1']);
        Subcategory::create(['name' => 'Foliares','categories_id' => '1']);
        Subcategory::create(['name' => 'Fertilizantes','categories_id' => '1']);
        Subcategory::create(['name' => 'Edáficos','categories_id' => '1']);
        Subcategory::create(['name' => 'Enmiendas','categories_id' => '1']);
        Subcategory::create(['name' => 'Otros','categories_id' => '1']);


        Subcategory::create(['name' => 'Herbicidas','categories_id' => '2']);
        Subcategory::create(['name' => 'Insecticidas','categories_id' => '2']);
        Subcategory::create(['name' => 'Fungicidas','categories_id' => '2']);
        Subcategory::create(['name' => 'Coadyuvantes','categories_id' => '2']);
        Subcategory::create(['name' => 'Herramientas','categories_id' => '2']);
        Subcategory::create(['name' => 'Accesorios','categories_id' => '2']);
        Subcategory::create(['name' => 'Semillas','categories_id' => '2']);
        Subcategory::create(['name' => 'Otros','categories_id' => '2']);


        Subcategory::create(['name' => 'Tractores','categories_id' => '3']);
        Subcategory::create(['name' => 'Maquinaria','categories_id' => '3']);
        Subcategory::create(['name' => 'pesada','categories_id' => '3']);
        Subcategory::create(['name' => 'Implementos','categories_id' => '3']);
        Subcategory::create(['name' => 'Generadores y Bombas','categories_id' => '3']);


        Subcategory::create(['name' => ' Transporte Granel','categories_id' => '4']);
        Subcategory::create(['name' => 'Transporte Líquido','categories_id' => '4']);
        Subcategory::create(['name' => 'Transporte especializados','categories_id' => '4']);

        Subcategory::create(['name' => 'Laboratorios','categories_id' => '5']);
        Subcategory::create(['name' => 'Geomántica','categories_id' => '5']);
        Subcategory::create(['name' => 'Diseño y Topografía','categories_id' => '5']);


        Subcategory::create(['name' => 'Bovinos','categories_id' => '6']);
        Subcategory::create(['name' => 'Equinos','categories_id' => '6']);
        Subcategory::create(['name' => 'Avicolas','categories_id' => '6']);
        Subcategory::create(['name' => 'Porcinos','categories_id' => '6']);
        Subcategory::create(['name' => 'Piscicultura','categories_id' => '6']);

        Subcategory::create(['name' => 'Tecnologia Agricola','categories_id' => '7']);
    }
}
