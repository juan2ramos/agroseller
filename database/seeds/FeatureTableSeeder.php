<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\Feature;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createFeature();
    }

    private function createFeature(){
        Feature::create([
            'baling' => 'Paquete',
            'size' => 'Grande',
            'weight' => 'Gramos',
            'metering' => 'Metros',
            'material' => 'Plastico',
        ]);
    }
}
