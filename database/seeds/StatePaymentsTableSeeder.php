<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\StatePayments;

class StatePaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatePayments::create(['state_zp' => '888','name' => 'Pago pendiente']);
        StatePayments::create(['state_zp' => '999','name' => 'Pago pendiente']);
        StatePayments::create(['state_zp' => '1','name' => 'Pago exitoso ']);
        StatePayments::create(['state_zp' => '1000','name' => 'Pago rechazado']);
        StatePayments::create(['state_zp' => '4000','name' => 'Pago rechazado CR']);
    }
}
