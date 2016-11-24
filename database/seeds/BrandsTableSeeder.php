<?php

use Agrosellers\Entities\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createBrands();
    }

    private function createBrands()
    {

        Brand::create(['id' => '2', 'name' => 'Colinagro']);
        Brand::create(['id' => '3', 'name' => 'Monsanto']);
        Brand::create(['id' => '4', 'name' => 'Yara']);
        Brand::create(['id' => '5', 'name' => 'Monomeros']);
        Brand::create(['id' => '6', 'name' => 'Campofert']);
        Brand::create(['id' => '7', 'name' => 'Nufarm']);
        Brand::create(['id' => '8', 'name' => 'Aygust']);
        Brand::create(['id' => '9', 'name' => 'AGSE']);
        Brand::create(['id' => '10', 'name' => 'Mejisulfatos']);
    }
}
