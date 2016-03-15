<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\Feature;
use Agrosellers\Entities\Subcategory;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->createFeature();
        //$this->createFeaturesSubcategories();
    }
    private function createFeaturesSubcategories(){
        $feature = Feature::find(1);
        $subcategory = Subcategory::find(1);
        $feature->subcategories()->save($subcategory);

    }
    private function createFeature(){
        Feature::create(['id' => '1', 'name' => 'presentation']);
        Feature::create(['id' => '2', 'name' => 'size']);
        Feature::create(['id' => '3', 'name' => 'weight']);
        Feature::create(['id' => '4', 'name' => 'measure']);
        Feature::create(['id' => '5', 'name' => 'material']);
        Feature::create(['id' => '6', 'name' => 'description']);
        Feature::create(['id' => '7', 'name' => 'composition']);
        //Feature::create(['id' => '8', 'name' => 'forms-employment']);
        Feature::create(['id' => '8', 'name' => 'price']);
        Feature::create(['id' => '9', 'name' => 'taxes']);
        Feature::create(['id' => '10', 'name' => 'available-quantity']);
        Feature::create(['id' => '11', 'name' => 'image-scale']);
        Feature::create(['id' => '12', 'name' => 'location']);
        Feature::create(['id' => '13', 'name' => 'description-use']);
    }
}
