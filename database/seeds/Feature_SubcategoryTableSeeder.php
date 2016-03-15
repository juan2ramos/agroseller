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

        Feature::create(['feature_id' => '1', 'subcategory_id' => '1']);
        Feature::create(['feature_id' => '1', 'subcategory_id' => '2']);
        Feature::create(['feature_id' => '1', 'subcategory_id' => '3']);
        Feature::create(['feature_id' => '1', 'subcategory_id' => '4']);
        Feature::create(['feature_id' => '1', 'subcategory_id' => '5']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '1', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '1', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '1', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '1', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '1', 'subcategory_id' => '28']);


        /********************************************************************************/
        /*                                                                              */
        /*                              2. FEATURE TAMAÑO                               */
        /*                                                                              */
        /********************************************************************************/

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '2', 'subcategory_id' => '6']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '7']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '8']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '9']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '10']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '11']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '12']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '2', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '17']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '2', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '2', 'subcategory_id' => '28']);

        /********************************************************************************/
        /*                                                                              */
        /*                              3. FEATURE PESO                                 */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        Feature::create(['feature_id' => '3', 'subcategory_id' => '1']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '2']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '3']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '4']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '5']);

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '3', 'subcategory_id' => '6']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '7']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '8']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '9']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '10']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '11']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '12']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '3', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '17']);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        Feature::create(['feature_id' => '3', 'subcategory_id' => '18']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '19']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '20']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '3', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '3', 'subcategory_id' => '28']);


        /********************************************************************************/
        /*                                                                              */
        /*                              4. FEATURE MEDIDA                               */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        Feature::create(['feature_id' => '4', 'subcategory_id' => '1']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '2']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '3']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '4']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '5']);

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '4', 'subcategory_id' => '6']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '7']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '8']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '9']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '10']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '11']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '12']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '4', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '17']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '4', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '4', 'subcategory_id' => '28']);

        /********************************************************************************/
        /*                                                                              */
        /*                              5. FEATURE MATERIAL                             */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        Feature::create(['feature_id' => '5', 'subcategory_id' => '1']);

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '5', 'subcategory_id' => '10']);
        Feature::create(['feature_id' => '5', 'subcategory_id' => '11']);
        Feature::create(['feature_id' => '5', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '5', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '5', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '5', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '5', 'subcategory_id' => '17']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '5', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '5', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '5', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '5', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '5', 'subcategory_id' => '28']);


        /********************************************************************************/
        /*                                                                              */
        /*                         6. FEATURE DESCRIPCION                               */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        Feature::create(['feature_id' => '6', 'subcategory_id' => '1']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '2']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '3']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '4']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '5']);

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '6', 'subcategory_id' => '6']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '7']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '8']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '9']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '10']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '11']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '12']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '6', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '17']);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        Feature::create(['feature_id' => '6', 'subcategory_id' => '18']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '19']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '20']);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        Feature::create(['feature_id' => '6', 'subcategory_id' => '21']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '22']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '23']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '6', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '6', 'subcategory_id' => '28']);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        Feature::create(['feature_id' => '6', 'subcategory_id' => '29']);


        /********************************************************************************/
        /*                                                                              */
        /*                         7. FEATURE FICHA TECNICA                             */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        Feature::create(['feature_id' => '7', 'subcategory_id' => '1']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '2']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '3']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '4']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '5']);

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '7', 'subcategory_id' => '6']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '7']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '8']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '9']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '12']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '7', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '17']);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        Feature::create(['feature_id' => '7', 'subcategory_id' => '18']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '19']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '20']);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        Feature::create(['feature_id' => '7', 'subcategory_id' => '21']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '22']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '23']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '7', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '7', 'subcategory_id' => '28']);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        Feature::create(['feature_id' => '7', 'subcategory_id' => '29']);



        /********************************************************************************/
        /*                                                                              */
        /*                         8. FEATURE PRECIO ACTUAL                             */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        Feature::create(['feature_id' => '8', 'subcategory_id' => '1']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '2']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '3']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '4']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '5']);

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '8', 'subcategory_id' => '6']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '7']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '8']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '9']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '10']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '11']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '12']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '8', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '17']);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        Feature::create(['feature_id' => '8', 'subcategory_id' => '18']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '19']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '20']);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        Feature::create(['feature_id' => '8', 'subcategory_id' => '21']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '22']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '23']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '8', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '8', 'subcategory_id' => '28']);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        Feature::create(['feature_id' => '8', 'subcategory_id' => '29']);

        /********************************************************************************/
        /*                                                                              */
        /*                         9. FEATURE IMPUESTOS                                */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        Feature::create(['feature_id' => '9', 'subcategory_id' => '1']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '2']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '3']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '4']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '5']);

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '9', 'subcategory_id' => '6']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '7']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '8']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '9']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '10']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '11']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '12']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '9', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '17']);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        Feature::create(['feature_id' => '9', 'subcategory_id' => '18']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '19']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '20']);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        Feature::create(['feature_id' => '9', 'subcategory_id' => '21']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '22']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '23']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '9', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '9', 'subcategory_id' => '28']);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        Feature::create(['feature_id' => '9', 'subcategory_id' => '29']);

        /********************************************************************************/
        /*                                                                              */
        /*                     10. FEATURE CANTIDAD DISPONIBLE                          */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        Feature::create(['feature_id' => '10', 'subcategory_id' => '1']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '2']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '3']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '4']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '5']);

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '10', 'subcategory_id' => '6']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '7']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '8']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '9']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '10']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '11']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '12']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '10', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '17']);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        Feature::create(['feature_id' => '10', 'subcategory_id' => '18']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '19']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '20']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '10', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '10', 'subcategory_id' => '28']);

        /********************************************************************************/
        /*                                                                              */
        /*                         11. FEATURE ESCALA IMAGEN                            */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        Feature::create(['feature_id' => '11', 'subcategory_id' => '1']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '2']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '3']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '4']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '5']);

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '11', 'subcategory_id' => '6']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '7']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '8']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '9']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '10']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '11']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '12']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '11', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '17']);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        Feature::create(['feature_id' => '11', 'subcategory_id' => '18']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '19']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '20']);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        Feature::create(['feature_id' => '11', 'subcategory_id' => '21']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '22']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '23']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '11', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '11', 'subcategory_id' => '28']);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        Feature::create(['feature_id' => '11', 'subcategory_id' => '29']);

        /********************************************************************************/
        /*                                                                              */
        /*                         12. FEATURE UBICACION                                */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        Feature::create(['feature_id' => '12', 'subcategory_id' => '1']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '2']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '3']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '4']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '5']);

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '12', 'subcategory_id' => '6']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '7']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '8']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '9']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '10']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '11']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '12']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '12', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '17']);

        /*********************** CATEGORY LOGISTICA Y TRANSPORTE  *************************/

        Feature::create(['feature_id' => '12', 'subcategory_id' => '18']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '19']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '20']);

        /*********************** CATEGORY SERVICIOS ESPECIALES  *************************/

        Feature::create(['feature_id' => '12', 'subcategory_id' => '21']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '22']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '23']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '12', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '12', 'subcategory_id' => '28']);

        /************************** CATEGORY TECNOLOGIA AGRICOLA  *************************/

        Feature::create(['feature_id' => '12', 'subcategory_id' => '29']);

        /********************************************************************************/
        /*                                                                              */
        /*                         13. FEATURE UBICACION                                */
        /*                                                                              */
        /********************************************************************************/

        /****************************** CATEGORY FERTILIZANTES **************************/

        Feature::create(['feature_id' => '13', 'subcategory_id' => '1']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '2']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '3']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '4']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '5']);

        /******************************* CATEGORY INSUMOS *******************************/

        Feature::create(['feature_id' => '13', 'subcategory_id' => '6']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '7']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '8']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '9']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '10']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '11']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '12']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '13']);

        /************************ CATERGORIA MAQUINARIA Y EQUIPOS *************************/

        Feature::create(['feature_id' => '13', 'subcategory_id' => '14']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '15']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '16']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '17']);

        /************************** CATEGORY INSUMOS PECUARIOS  *************************/

        Feature::create(['feature_id' => '13', 'subcategory_id' => '24']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '25']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '26']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '27']);
        Feature::create(['feature_id' => '13', 'subcategory_id' => '28']);
    }
}
