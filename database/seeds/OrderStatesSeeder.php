<?php

use Agrosellers\Entities\OrderState;
use Illuminate\Database\Seeder;

class OrderStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderState::create(['name'=> 'Pago pendiente']);
        OrderState::create(['name'=> 'Confirmado']);
        OrderState::create(['name'=> 'En camino ']);
        OrderState::create(['name'=> 'Entregado']);
    }
}
