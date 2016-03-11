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
        /***************** CATEGORIA FERTILIZANTES ********************/
        Subcategory::create(['name' => 'Abonos orgánicos','categories_id' => '1']);
        Subcategory::create(['name' => 'Fertilizantes Foliares','categories_id' => '1']);
        Subcategory::create(['name' => 'Fertilizantes Edáficos','categories_id' => '1']);
        Subcategory::create(['name' => 'Enmiendas','categories_id' => '1']);
        Subcategory::create(['name' => 'Otros','categories_id' => '1']);

        /***************** CATEGORIA INSUMOS ********************/
        Subcategory::create(['name' => 'Herbicidas','categories_id' => '2']);
        Subcategory::create(['name' => 'Insecticidas','categories_id' => '2']);
        Subcategory::create(['name' => 'Fungicidas','categories_id' => '2']);
        Subcategory::create(['name' => 'Coadyuvantes','categories_id' => '2']);
        Subcategory::create(['name' => 'Herramientas','categories_id' => '2']);
        Subcategory::create(['name' => 'Accesorios','categories_id' => '2']);
        Subcategory::create(['name' => 'Semillas','categories_id' => '2']);
        Subcategory::create(['name' => 'Otros','categories_id' => '2']);

        /***************** CATEGORIA MAQUINARIA Y EQUIPOS ********************/
        Subcategory::create(['name' => 'Tractores','categories_id' => '3']);
        Subcategory::create(['name' => 'Maquinaria pesada','categories_id' => '3']);
        Subcategory::create(['name' => 'Implementos','categories_id' => '3']);
        Subcategory::create(['name' => 'Generadores y Bombas','categories_id' => '3']);

        /***************** CATEGORIA LOGISTICA Y TRANSPORTE ********************/
        Subcategory::create(['name' => ' Transporte Granel','categories_id' => '4']);
        Subcategory::create(['name' => 'Transporte Líquido','categories_id' => '4']);
        Subcategory::create(['name' => 'Transporte especializados','categories_id' => '4']);

        /***************** CATEGORIA SERVICIOS ESPECIALES ********************/
        Subcategory::create(['name' => 'Laboratorios','categories_id' => '5']);
        Subcategory::create(['name' => 'Geomántica','categories_id' => '5']);
        Subcategory::create(['name' => 'Diseño y Topografía','categories_id' => '5']);

        /***************** CATEGORIA INSUMOS PECUARIOS ********************/
        Subcategory::create(['name' => 'Bovinos','categories_id' => '6']);
        Subcategory::create(['name' => 'Equinos','categories_id' => '6']);
        Subcategory::create(['name' => 'Avicolas','categories_id' => '6']);
        Subcategory::create(['name' => 'Porcinos','categories_id' => '6']);
        Subcategory::create(['name' => 'Piscicultura','categories_id' => '6']);

        /***************** CATEGORIA TECNOLOGIA AGRICOLA ********************/
        Subcategory::create(['name' => 'Tecnología Agrícola','categories_id' => '7']);
    }
}
