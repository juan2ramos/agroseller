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
        Subcategory::create(['id' => '1','name' => 'Abonos orgánicos','categories_id' => '1', 'slug' => 'abonos-organicos']);
        Subcategory::create(['id' => '2','name' => 'Fertilizantes Foliares','categories_id' => '1', 'slug' => 'fertilizantes-foliares']);
        Subcategory::create(['id' => '3','name' => 'Fertilizantes Edáficos','categories_id' => '1', 'slug' => 'fertilizantes-edaficos']);
        Subcategory::create(['id' => '4','name' => 'Enmiendas','categories_id' => '1', 'slug' => 'enmiendas']);
        Subcategory::create(['id' => '5','name' => 'Otros','categories_id' => '1', 'slug' => 'otros']);

        /***************** CATEGORIA INSUMOS ********************/
        Subcategory::create(['id' => '6','name' => 'Herbicidas','categories_id' => '2', 'slug' => 'herbicidas']);
        Subcategory::create(['id' => '7','name' => 'Insecticidas','categories_id' => '2', 'slug' => 'insecticidas']);
        Subcategory::create(['id' => '8','name' => 'Fungicidas','categories_id' => '2', 'slug' => 'fungicidas']);
        Subcategory::create(['id' => '9','name' => 'Coadyuvantes','categories_id' => '2', 'slug' => 'coadyuvantes']);
        Subcategory::create(['id' => '10','name' => 'Herramientas','categories_id' => '2', 'slug' => 'herramientas']);
        Subcategory::create(['id' => '11','name' => 'Accesorios','categories_id' => '2', 'slug' => 'accesorios']);
        Subcategory::create(['id' => '12','name' => 'Semillas','categories_id' => '2', 'slug' => 'semillas']);
        Subcategory::create(['id' => '13','name' => 'Otros','categories_id' => '2', 'slug' => 'otros']);

        /***************** CATEGORIA MAQUINARIA Y EQUIPOS ********************/
        Subcategory::create(['id' => '14','name' => 'Tractores','categories_id' => '3', 'slug' => 'tractores']);
        Subcategory::create(['id' => '15','name' => 'Maquinaria pesada','categories_id' => '3', 'slug' => 'maquinaria-pesada']);
        Subcategory::create(['id' => '16','name' => 'Implementos','categories_id' => '3', 'slug' => 'implementos']);
        Subcategory::create(['id' => '17','name' => 'Generadores y Bombas','categories_id' => '3', 'slug' => 'generadores-y-bombas']);

        /***************** CATEGORIA LOGISTICA Y TRANSPORTE ********************/
        Subcategory::create(['id' => '18','name' => ' Transporte Granel','categories_id' => '4', 'slug' => 'transporte-granel']);
        Subcategory::create(['id' => '19','name' => 'Transporte Líquido','categories_id' => '4', 'slug' => 'transporte-liquido']);
        Subcategory::create(['id' => '20','name' => 'Transporte especializados','categories_id' => '4', 'slug' => 'transporte-especializados']);

        /***************** CATEGORIA SERVICIOS ESPECIALES ********************/
        Subcategory::create(['id' => '21','name' => 'Laboratorios','categories_id' => '5', 'slug' => 'laboratorios']);
        Subcategory::create(['id' => '22','name' => 'Geomántica','categories_id' => '5', 'slug' => 'geomantica']);
        Subcategory::create(['id' => '23','name' => 'Diseño y Topografía','categories_id' => '5', 'slug' => 'diseno-y-topografia']);

        /***************** CATEGORIA INSUMOS PECUARIOS ********************/
        Subcategory::create(['id' => '24','name' => 'Bovinos','categories_id' => '6', 'slug' => 'bovinos']);
        Subcategory::create(['id' => '25','name' => 'Equinos','categories_id' => '6', 'slug' => 'equinos']);
        Subcategory::create(['id' => '26','name' => 'Avicolas','categories_id' => '6', 'slug' => 'avicolas']);
        Subcategory::create(['id' => '27','name' => 'Porcinos','categories_id' => '6', 'slug' => 'porcinos']);
        Subcategory::create(['id' => '28','name' => 'Piscicultura','categories_id' => '6', 'slug' => 'piscicultura']);

        /***************** CATEGORIA TECNOLOGIA AGRICOLA ********************/
        Subcategory::create(['id' => '29','name' => 'Tecnología Agrícola','categories_id' => '7', 'slug' => 'tecnologia-agricola']);
    }
}