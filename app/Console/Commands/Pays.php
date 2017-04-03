<?php

namespace Agrosellers\Console\Commands;

use Agrosellers\Services\ZonaPagos;
use Agrosellers\User;
use Illuminate\Console\Command;
use Activity;




class Pays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pay:zonapagos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'revisar pagos en Zonapagos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::whereHas('orders', function ($q) {
            $q->where('zp_state', '999')->orWhere('zp_state', '888');
        })->with(['orders' => function ($q) {
            $q->where('zp_state', '999')->orWhere('zp_state', '888');
        }])->get();
        foreach ($users as $user) {
            foreach ($user->orders as $order) {
                $zp = ZonaPagos::create();
                $a = json_decode($zp->checkPay($order->zp_buy_id));
                if ($a->res_pagos_v3) {
                    $ant = $order->zp_state;
                    $new = $a->res_pagos_v3[0]->int_estado_pago;
                    $order->zp_state = $new;
                    $order->save();
                    Activity::log('Cambio de estado ' . $ant .' a estado ' . $new . ' por medio de zonda en order->zp_buy_id '.$order->zp_buy_id,$user );
                }
            }
        }


    }
}