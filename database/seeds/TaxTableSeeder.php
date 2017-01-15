<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\Tax;

class TaxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tax::create(['name' => 'iva', 'percent' => 19]);
        Tax::create(['name' => 'retefuente', 'percent' => 5]);
    }
}
