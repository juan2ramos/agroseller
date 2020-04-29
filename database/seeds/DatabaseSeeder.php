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

        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SubcategoryTableSeeder::class);
        $this->call(FeatureTableSeeder::class);
        $this->call(Feature_SubcategoryTableSeeder::class);
        $this->call(FarmCategoryTableSeeder::class);
        $this->call(FarmTableSeeder::class);
        $this->call(StateOrdersSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(TaxTableSeeder::class);
        $this->call(StatePaymentsTableSeeder::class);
        Model::reguard();
    }
}
