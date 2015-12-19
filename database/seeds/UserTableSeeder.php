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
        factory(App\User::class)->create([
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
        factory(App\User::class, 49)->create();
    }
}
