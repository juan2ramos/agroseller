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
        Subcategory::create(['id' => '1','name' => 'Abonos orgánicos','categories_id' => '1']);
        Subcategory::create(['id' => '2','name' => 'Fertilizantes Foliares','categories_id' => '1']);
        Subcategory::create(['id' => '3','name' => 'Fertilizantes Edáficos','categories_id' => '1']);
        Subcategory::create(['id' => '4','name' => 'Enmiendas','categories_id' => '1']);
        Subcategory::create(['id' => '5','name' => 'Otros','categories_id' => '1']);

        /***************** CATEGORIA INSUMOS ********************/
        Subcategory::create(['id' => '6','name' => 'Herbicidas','categories_id' => '2']);
        Subcategory::create(['id' => '7','name' => 'Insecticidas','categories_id' => '2']);
        Subcategory::create(['id' => '8','name' => 'Fungicidas','categories_id' => '2']);
        Subcategory::create(['id' => '9','name' => 'Coadyuvantes','categories_id' => '2']);
        Subcategory::create(['id' => '10','name' => 'Herramientas','categories_id' => '2']);
        Subcategory::create(['id' => '11','name' => 'Accesorios','categories_id' => '2']);
        Subcategory::create(['id' => '12','name' => 'Semillas','categories_id' => '2']);
        Subcategory::create(['id' => '13','name' => 'Otros','categories_id' => '2']);

        /***************** CATEGORIA MAQUINARIA Y EQUIPOS ********************/
        Subcategory::create(['id' => '14','name' => 'Tractores','categories_id' => '3']);
        Subcategory::create(['id' => '15','name' => 'Maquinaria pesada','categories_id' => '3']);
        Subcategory::create(['id' => '16','name' => 'Implementos','categories_id' => '3']);
        Subcategory::create(['id' => '17','name' => 'Generadores y Bombas','categories_id' => '3']);

        /***************** CATEGORIA LOGISTICA Y TRANSPORTE ********************/
        Subcategory::create(['id' => '18','name' => ' Transporte Granel','categories_id' => '4']);
        Subcategory::create(['id' => '19','name' => 'Transporte Líquido','categories_id' => '4']);
        Subcategory::create(['id' => '20','name' => 'Transporte especializados','categories_id' => '4']);

        /***************** CATEGORIA SERVICIOS ESPECIALES ********************/
        Subcategory::create(['id' => '21','name' => 'Laboratorios','categories_id' => '5']);
        Subcategory::create(['id' => '22','name' => 'Geomántica','categories_id' => '5']);
        Subcategory::create(['id' => '23','name' => 'Diseño y Topografía','categories_id' => '5']);

        /***************** CATEGORIA INSUMOS PECUARIOS ********************/
        Subcategory::create(['id' => '24','name' => 'Bovinos','categories_id' => '6']);
        Subcategory::create(['id' => '25','name' => 'Equinos','categories_id' => '6']);
        Subcategory::create(['id' => '26','name' => 'Avicolas','categories_id' => '6']);
        Subcategory::create(['id' => '27','name' => 'Porcinos','categories_id' => '6']);
        Subcategory::create(['id' => '28','name' => 'Piscicultura','categories_id' => '6']);

        /***************** CATEGORIA TECNOLOGIA AGRICOLA ********************/
        Subcategory::create(['id' => '29','name' => 'Tecnología Agrícola','categories_id' => '7']);
    }
}
