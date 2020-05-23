<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\Brand;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'Marca prueba',
            'logo' => 'logo.png',
            'description' => 'description'
        ]);
    }
}
