<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Agrosellers\User::class)->create([
            'name' => 'Juan',
            'email' => 'juan2ramos@gmail.com',
            'username' => 'juan2ramos',
            'last_name' => 'Ramos',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '1',
            'password' => bcrypt('12345'),
        ]);
        factory(Agrosellers\User::class)->create([
            'name' => 'Ximena',
            'email' => 'xigom@hotmail.com',
            'username' => 'ximena',
            'last_name' => 'Gomez',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '1',
            'password' => bcrypt('12345'),
        ]);

        factory(Agrosellers\User::class)->create([
            'name' => 'miller',
            'email' => 'millerpreciado@gmail.com',
            'username' => 'miller',
            'last_name' => 'preciado',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '1',
            'password' => bcrypt('12345'),
        ]);

        factory(Agrosellers\User::class)->create([
            'name' => 'Alejandra',
            'email' => 'luza.231@hotmail.com',
            'username' => 'Alejandra',
            'last_name' => 'Betancur',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '1',
            'password' => bcrypt('12345'),
        ]);
        factory(Agrosellers\User::class, 49)->create();
    }
}
