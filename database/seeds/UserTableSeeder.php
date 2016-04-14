<?php

use Illuminate\Database\Seeder;
use Agrosellers\User;
use Agrosellers\Entities\Provider;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
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

        factory(User::class)->create([
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

        factory(User::class)->create([
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

        factory(User::class)->create([
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

        factory(Agrosellers\User::class, 10)->create();

        /******************** Super Administrator **********************/

        factory(User::class)->create([
            'name' => 'Santiago',
            'email' => 'sanruiz1003@gmail.com',
            'username' => 'santo52',
            'last_name' => 'Ruiz',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '1',
            'password' => bcrypt('12345'),
        ]);

        /******************** Administrator **********************/

        factory(User::class)->create([
            'name' => 'administrador',
            'email' => 'administrador@gmail.com',
            'username' => 'administrador',
            'last_name' => '',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '2',
            'password' => bcrypt('12345'),
        ]);

        /******************** Provider **********************/

        factory(User::class)->create([
            'name' => 'Proveedor',
            'email' => 'proveedor@gmail.com',
            'username' => 'proveedor',
            'last_name' => '',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '3',
            'password' => bcrypt('12345'),
        ]);

        Provider::create([
            'company-name' => 'Bayer',
            'location' => 'Bogota',
            'address' => 'CR 45B 69C 33',
            'contact' => 'Carlos el Contacto',
            'contact-phone' => '3008656623',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae culpa dolor ea eos modi perferendis porro qui, quisquam quod similique!',
            'NIT' => '12234555433',
            'url-video' => 'https://www.youtube.com/watch?v=6F6giu8nOcQ',
            'sales-manager-name' => 'Santiago el Vendedor',
            'licence' => 'http://academy.iglobalstores.com/wp-content/uploads/2011/11/sanitary-certificate.png',
            'dispatch-time' => '5',
            'legal-agent' => 'Andres el Rep Legal',
            'user_id' => 17,
            'logo' => 'http://www.activedocs.com/images/2013-12-Bayer-Gold-Award.jpg',
            'nick-name' => 'bayer93',
            'taxpayer' => 'taxpayer',
            'web-site' => 'http://www.bayerandina.com/quienes_somos/nuestra_colombia.htm',
            'titular-name' => 'Carlos el titular',
            'bank-name' => 'Banco Agrario',
            'bank-country' => 'Colombia',
            'count-number' => '432476532262-1'
        ]);

        /******************** Customer **********************/

        factory(User::class)->create([
            'name' => 'Cliente',
            'email' => 'cliente@gmail.com',
            'username' => 'cliente',
            'last_name' => '',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '4',
            'password' => bcrypt('12345'),
        ]);

        /******************** Agents *************************/

        factory(User::class)->create([
            'name' => 'Agent1',
            'email' => 'agent1@agrosellers.com',
            'username' => 'Agent One',
            'last_name' => '',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '5',
            'password' => bcrypt('12345'),
        ]);

        factory(User::class)->create([
            'name' => 'Agent2',
            'email' => 'agent2@agrosellers.com',
            'username' => 'Agent Two',
            'last_name' => '',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '5',
            'password' => bcrypt('12345'),
        ]);

        factory(User::class)->create([
            'name' => 'Agent3',
            'email' => 'agent3@agrosellers.com',
            'username' => 'Agent Three',
            'last_name' => '',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '5',
            'password' => bcrypt('12345'),
        ]);

        factory(User::class)->create([
            'name' => 'Agent4',
            'email' => 'agent4@agrosellers.com',
            'username' => 'Agent Four',
            'last_name' => '',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '5',
            'password' => bcrypt('12345'),
        ]);

        factory(User::class)->create([
            'name' => 'Agent5',
            'email' => 'agent5@agrosellers.com',
            'username' => 'Agent Five',
            'last_name' => '',
            'mobile_phone' => '',
            'phone' => '',
            'photo' => '',
            'role_id' => '5',
            'password' => bcrypt('12345'),

        ]);
    }
}
