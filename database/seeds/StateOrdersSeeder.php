<?php

use Agrosellers\Entities\StateOrder;
use Illuminate\Database\Seeder;

class StateOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StateOrder::create(['name' => 'Pago pendiente']);
        StateOrder::create(['name' => 'Confirmado']);
        StateOrder::create(['name' => 'En camino ']);
        StateOrder::create(['name' => 'Entregado']);
    }
}
