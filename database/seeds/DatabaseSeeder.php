<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SubcategoryTableSeeder::class);
        $this->call(FeatureTableSeeder::class);
        $this->call(Feature_SubcategoryTableSeeder::class);
        $this->call(FarmTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        Model::reguard();
    }
}
