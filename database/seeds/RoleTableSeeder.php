<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'Super Administrador']);
        Role::create(['name'=>'Administrador']);
        Role::create(['name'=>'Proveedor']);
        Role::create(['name'=>'Cliente']);
        Role::create(['name'=>'Agente']);
        Role::create(['name'=>'Analista']);
    }
}
