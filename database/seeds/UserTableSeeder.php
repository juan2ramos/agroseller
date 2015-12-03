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
            'user-name' => 'juan2ramos',
            'role' => 'superAdministrators',
            'password' => bcrypt('12345'),
        ]);
        factory(App\User::class, 49)->create();

    }
}
