<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\Feature;
use Agrosellers\Entities\Subcategory;

class Feature_SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /********************************************************************************/
        /*                                                                              */
        /*                              1. FEATURE PRESENTACIÓN                         */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/
        $this->createFeatureSubcategory(1,1);
        $this->createFeatureSubcategory(1,2);
        $this->createFeatureSubcategory(1,3);
        $this->createFeatureSubcategory(1,4);
        $this->createFeatureSubcategory(1,5);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/
        $this->createFeatureSubcategory(1,24);
        $this->createFeatureSubcategory(1,25);
        $this->createFeatureSubcategory(1,26);
        $this->createFeatureSubcategory(1,27);
        $this->createFeatureSubcategory(1,28);

        /********************************************************************************/
        /*                                                                              */
        /*                              2. FEATURE TAMAÑO                               */
        /*                                                                              */
        /********************************************************************************/

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(2,6);
        $this->createFeatureSubcategory(2,7);
        $this->createFeatureSubcategory(2,8);
        $this->createFeatureSubcategory(2,9);
        $this->createFeatureSubcategory(2,10);
        $this->createFeatureSubcategory(2,11);
        $this->createFeatureSubcategory(2,12);
        $this->createFeatureSubcategory(2,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(2,14);
        $this->createFeatureSubcategory(2,15);
        $this->createFeatureSubcategory(2,16);
        $this->createFeatureSubcategory(2,17);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(2,24);
        $this->createFeatureSubcategory(2,25);
        $this->createFeatureSubcategory(2,26);
        $this->createFeatureSubcategory(2,27);
        $this->createFeatureSubcategory(2,28);

        /********************************************************************************/
        /*                                                                              */
        /*                              3. FEATURE PESO                                 */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        $this->createFeatureSubcategory(3,1);
        $this->createFeatureSubcategory(3,2);
        $this->createFeatureSubcategory(3,3);
        $this->createFeatureSubcategory(3,4);
        $this->createFeatureSubcategory(3,5);

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(3,6);
        $this->createFeatureSubcategory(3,7);
        $this->createFeatureSubcategory(3,8);
        $this->createFeatureSubcategory(3,9);
        $this->createFeatureSubcategory(3,10);
        $this->createFeatureSubcategory(3,11);
        $this->createFeatureSubcategory(3,12);
        $this->createFeatureSubcategory(3,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(3,14);
        $this->createFeatureSubcategory(3,15);
        $this->createFeatureSubcategory(3,16);
        $this->createFeatureSubcategory(3,17);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        $this->createFeatureSubcategory(3,18);
        $this->createFeatureSubcategory(3,19);
        $this->createFeatureSubcategory(3,20);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(3,24);
        $this->createFeatureSubcategory(3,25);
        $this->createFeatureSubcategory(3,26);
        $this->createFeatureSubcategory(3,27);
        $this->createFeatureSubcategory(3,28);


        /********************************************************************************/
        /*                                                                              */
        /*                              4. FEATURE MEDIDA                               */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        $this->createFeatureSubcategory(4,1);
        $this->createFeatureSubcategory(4,2);
        $this->createFeatureSubcategory(4,3);
        $this->createFeatureSubcategory(4,4);
        $this->createFeatureSubcategory(4,5);

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(4,6);
        $this->createFeatureSubcategory(4,7);
        $this->createFeatureSubcategory(4,8);
        $this->createFeatureSubcategory(4,9);
        $this->createFeatureSubcategory(4,10);
        $this->createFeatureSubcategory(4,11);
        $this->createFeatureSubcategory(4,12);
        $this->createFeatureSubcategory(4,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(4,14);
        $this->createFeatureSubcategory(4,15);
        $this->createFeatureSubcategory(4,16);
        $this->createFeatureSubcategory(4,17);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(4,24);
        $this->createFeatureSubcategory(4,25);
        $this->createFeatureSubcategory(4,26);
        $this->createFeatureSubcategory(4,27);
        $this->createFeatureSubcategory(4,28);


        /********************************************************************************/
        /*                                                                              */
        /*                              5. FEATURE MATERIAL                             */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        $this->createFeatureSubcategory(5,1);

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(5,10);
        $this->createFeatureSubcategory(5,11);
        $this->createFeatureSubcategory(5,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(5,14);
        $this->createFeatureSubcategory(5,15);
        $this->createFeatureSubcategory(5,16);
        $this->createFeatureSubcategory(5,17);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(5,24);
        $this->createFeatureSubcategory(5,25);
        $this->createFeatureSubcategory(5,26);
        $this->createFeatureSubcategory(5,27);
        $this->createFeatureSubcategory(5,28);


        /********************************************************************************/
        /*                                                                              */
        /*                         6. FEATURE DESCRIPCION                               */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        $this->createFeatureSubcategory(6,1);
        $this->createFeatureSubcategory(6,2);
        $this->createFeatureSubcategory(6,3);
        $this->createFeatureSubcategory(6,4);
        $this->createFeatureSubcategory(6,5);

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(6,6);
        $this->createFeatureSubcategory(6,7);
        $this->createFeatureSubcategory(6,8);
        $this->createFeatureSubcategory(6,9);
        $this->createFeatureSubcategory(6,10);
        $this->createFeatureSubcategory(6,11);
        $this->createFeatureSubcategory(6,12);
        $this->createFeatureSubcategory(6,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(6,14);
        $this->createFeatureSubcategory(6,15);
        $this->createFeatureSubcategory(6,16);
        $this->createFeatureSubcategory(6,17);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        $this->createFeatureSubcategory(6,18);
        $this->createFeatureSubcategory(6,19);
        $this->createFeatureSubcategory(6,20);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        $this->createFeatureSubcategory(6,21);
        $this->createFeatureSubcategory(6,22);
        $this->createFeatureSubcategory(6,23);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(6,24);
        $this->createFeatureSubcategory(6,25);
        $this->createFeatureSubcategory(6,26);
        $this->createFeatureSubcategory(6,27);
        $this->createFeatureSubcategory(6,28);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        $this->createFeatureSubcategory(6,29);

        /********************************************************************************/
        /*                                                                              */
        /*                         7. FEATURE FICHA TECNICA                             */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        $this->createFeatureSubcategory(7,1);
        $this->createFeatureSubcategory(7,2);
        $this->createFeatureSubcategory(7,3);
        $this->createFeatureSubcategory(7,4);
        $this->createFeatureSubcategory(7,5);

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(7,6);
        $this->createFeatureSubcategory(7,7);
        $this->createFeatureSubcategory(7,8);
        $this->createFeatureSubcategory(7,9);
        $this->createFeatureSubcategory(7,12);
        $this->createFeatureSubcategory(7,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(7,14);
        $this->createFeatureSubcategory(7,15);
        $this->createFeatureSubcategory(7,16);
        $this->createFeatureSubcategory(7,17);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        $this->createFeatureSubcategory(7,18);
        $this->createFeatureSubcategory(7,19);
        $this->createFeatureSubcategory(7,20);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        $this->createFeatureSubcategory(7,21);
        $this->createFeatureSubcategory(7,22);
        $this->createFeatureSubcategory(7,23);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(7,24);
        $this->createFeatureSubcategory(7,25);
        $this->createFeatureSubcategory(7,26);
        $this->createFeatureSubcategory(7,27);
        $this->createFeatureSubcategory(7,28);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        $this->createFeatureSubcategory(7,29);

        /********************************************************************************/
        /*                                                                              */
        /*                         8. FEATURE PRECIO ACTUAL                             */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        $this->createFeatureSubcategory(8,1);
        $this->createFeatureSubcategory(8,2);
        $this->createFeatureSubcategory(8,3);
        $this->createFeatureSubcategory(8,4);
        $this->createFeatureSubcategory(8,5);

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(8,6);
        $this->createFeatureSubcategory(8,7);
        $this->createFeatureSubcategory(8,8);
        $this->createFeatureSubcategory(8,9);
        $this->createFeatureSubcategory(8,12);
        $this->createFeatureSubcategory(8,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(8,14);
        $this->createFeatureSubcategory(8,15);
        $this->createFeatureSubcategory(8,16);
        $this->createFeatureSubcategory(8,17);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        $this->createFeatureSubcategory(8,18);
        $this->createFeatureSubcategory(8,19);
        $this->createFeatureSubcategory(8,20);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        $this->createFeatureSubcategory(8,21);
        $this->createFeatureSubcategory(8,22);
        $this->createFeatureSubcategory(8,23);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(8,24);
        $this->createFeatureSubcategory(8,25);
        $this->createFeatureSubcategory(8,26);
        $this->createFeatureSubcategory(8,27);
        $this->createFeatureSubcategory(8,28);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        $this->createFeatureSubcategory(8,29);

        /********************************************************************************/
        /*                                                                              */
        /*                         9. FEATURE IMPUESTOS                                */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        $this->createFeatureSubcategory(9,1);
        $this->createFeatureSubcategory(9,2);
        $this->createFeatureSubcategory(9,3);
        $this->createFeatureSubcategory(9,4);
        $this->createFeatureSubcategory(9,5);

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(9,6);
        $this->createFeatureSubcategory(9,7);
        $this->createFeatureSubcategory(9,8);
        $this->createFeatureSubcategory(9,9);
        $this->createFeatureSubcategory(9,10);
        $this->createFeatureSubcategory(9,11);
        $this->createFeatureSubcategory(9,12);
        $this->createFeatureSubcategory(9,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(9,14);
        $this->createFeatureSubcategory(9,15);
        $this->createFeatureSubcategory(9,16);
        $this->createFeatureSubcategory(9,17);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        $this->createFeatureSubcategory(9,18);
        $this->createFeatureSubcategory(9,19);
        $this->createFeatureSubcategory(9,20);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        $this->createFeatureSubcategory(9,21);
        $this->createFeatureSubcategory(9,22);
        $this->createFeatureSubcategory(9,23);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(9,24);
        $this->createFeatureSubcategory(9,25);
        $this->createFeatureSubcategory(9,26);
        $this->createFeatureSubcategory(9,27);
        $this->createFeatureSubcategory(9,28);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        $this->createFeatureSubcategory(9,29);

        /********************************************************************************/
        /*                                                                              */
        /*                     10. FEATURE CANTIDAD DISPONIBLE                          */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        $this->createFeatureSubcategory(10,1);
        $this->createFeatureSubcategory(10,2);
        $this->createFeatureSubcategory(10,3);
        $this->createFeatureSubcategory(10,4);
        $this->createFeatureSubcategory(10,5);

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(10,6);
        $this->createFeatureSubcategory(10,7);
        $this->createFeatureSubcategory(10,8);
        $this->createFeatureSubcategory(10,9);
        $this->createFeatureSubcategory(10,10);
        $this->createFeatureSubcategory(10,11);
        $this->createFeatureSubcategory(10,12);
        $this->createFeatureSubcategory(10,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(10,14);
        $this->createFeatureSubcategory(10,15);
        $this->createFeatureSubcategory(10,16);
        $this->createFeatureSubcategory(10,17);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        $this->createFeatureSubcategory(10,18);
        $this->createFeatureSubcategory(10,19);
        $this->createFeatureSubcategory(10,20);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(10,24);
        $this->createFeatureSubcategory(10,25);
        $this->createFeatureSubcategory(10,26);
        $this->createFeatureSubcategory(10,27);
        $this->createFeatureSubcategory(10,28);

        /********************************************************************************/
        /*                                                                              */
        /*                         11. FEATURE ESCALA IMAGEN                            */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        $this->createFeatureSubcategory(11,1);
        $this->createFeatureSubcategory(11,2);
        $this->createFeatureSubcategory(11,3);
        $this->createFeatureSubcategory(11,4);
        $this->createFeatureSubcategory(11,5);

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(11,6);
        $this->createFeatureSubcategory(11,7);
        $this->createFeatureSubcategory(11,8);
        $this->createFeatureSubcategory(11,9);
        $this->createFeatureSubcategory(11,10);
        $this->createFeatureSubcategory(11,11);
        $this->createFeatureSubcategory(11,12);
        $this->createFeatureSubcategory(11,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(11,14);
        $this->createFeatureSubcategory(11,15);
        $this->createFeatureSubcategory(11,16);
        $this->createFeatureSubcategory(11,17);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        $this->createFeatureSubcategory(11,18);
        $this->createFeatureSubcategory(11,19);
        $this->createFeatureSubcategory(11,20);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        $this->createFeatureSubcategory(11,21);
        $this->createFeatureSubcategory(11,22);
        $this->createFeatureSubcategory(11,23);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(11,24);
        $this->createFeatureSubcategory(11,25);
        $this->createFeatureSubcategory(11,26);
        $this->createFeatureSubcategory(11,27);
        $this->createFeatureSubcategory(11,28);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        $this->createFeatureSubcategory(11,29);

        /********************************************************************************/
        /*                                                                              */
        /*                         12. FEATURE UBICACION                                */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        $this->createFeatureSubcategory(12,1);
        $this->createFeatureSubcategory(12,2);
        $this->createFeatureSubcategory(12,3);
        $this->createFeatureSubcategory(12,4);
        $this->createFeatureSubcategory(12,5);

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(12,6);
        $this->createFeatureSubcategory(12,7);
        $this->createFeatureSubcategory(12,8);
        $this->createFeatureSubcategory(12,9);
        $this->createFeatureSubcategory(12,10);
        $this->createFeatureSubcategory(12,11);
        $this->createFeatureSubcategory(12,12);
        $this->createFeatureSubcategory(12,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(12,14);
        $this->createFeatureSubcategory(12,15);
        $this->createFeatureSubcategory(12,16);
        $this->createFeatureSubcategory(12,17);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        $this->createFeatureSubcategory(12,18);
        $this->createFeatureSubcategory(12,19);
        $this->createFeatureSubcategory(12,20);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        $this->createFeatureSubcategory(12,21);
        $this->createFeatureSubcategory(12,22);
        $this->createFeatureSubcategory(12,23);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(12,24);
        $this->createFeatureSubcategory(12,25);
        $this->createFeatureSubcategory(12,26);
        $this->createFeatureSubcategory(12,27);
        $this->createFeatureSubcategory(12,28);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        $this->createFeatureSubcategory(12,29);


        /********************************************************************************/
        /*                                                                              */
        /*                         13. FEATURE UBICACION                                */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        $this->createFeatureSubcategory(13,1);
        $this->createFeatureSubcategory(13,2);
        $this->createFeatureSubcategory(13,3);
        $this->createFeatureSubcategory(13,4);
        $this->createFeatureSubcategory(13,5);

        /******************************* CATEGORY INSUMOS *******************************/

        $this->createFeatureSubcategory(13,6);
        $this->createFeatureSubcategory(13,7);
        $this->createFeatureSubcategory(13,8);
        $this->createFeatureSubcategory(13,9);
        $this->createFeatureSubcategory(13,10);
        $this->createFeatureSubcategory(13,11);
        $this->createFeatureSubcategory(13,12);
        $this->createFeatureSubcategory(13,13);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        $this->createFeatureSubcategory(13,14);
        $this->createFeatureSubcategory(13,15);
        $this->createFeatureSubcategory(13,16);
        $this->createFeatureSubcategory(13,17);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        $this->createFeatureSubcategory(13,24);
        $this->createFeatureSubcategory(13,25);
        $this->createFeatureSubcategory(13,26);
        $this->createFeatureSubcategory(13,27);
        $this->createFeatureSubcategory(13,28);



    }

    private function createFeatureSubcategory($feature_id, $subcategory_id){
        $feature = Feature::find($feature_id);
        $subcategory = Subcategory::find($subcategory_id);
        $feature->subcategories()->save($subcategory);
    }
}
