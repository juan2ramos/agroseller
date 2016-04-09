<?php

use Illuminate\Database\Seeder;
use Agrosellers\Entities\Product;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['presentation' => 'bolsa',
                            'size' => '12mt',
                            'weight' => '29.2kg',
                            'measure' => '3mt',
                            'material' => 'cabulla',
                            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                            'composition' => 'composition',
                            'forms_employment' => 'forms employment',
                            'price' => 300000,
                            'taxes' => 'taxes',
                            'available_quantity' => 13,
                            'image_scale' => '300',
                            'location' => 'UbicacionMaps',
                            'important_offer' => false,
                            'offer_price' => 220000,
                            'subcategory_id' => 1,
                            'name' => 'Inquifesa',
                            'slug' => 'inquifesa-slug',
                            'offer_on' => '',
                            'offer_off' => '',
                            'user_id' => 18]);

        Product::create(['presentation' => 'bolsa2',
                            'size' => '123mt',
                            'weight' => '29.2kg',
                            'measure' => '3mt',
                            'material' => 'cabulla2',
                            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                            'composition' => 'composition2',
                            'forms_employment' => 'forms employment2',
                            'price' => 20000,
                            'taxes' => 'taxes',
                            'available_quantity' => 10,
                            'image_scale' => '300',
                            'location' => 'UbicacionMaps',
                            'important_offer' => false,
                            'offer_price' => 100000,
                            'subcategory_id' => 2,
                            'name' => 'Inquifesa',
                            'slug' => 'inquifesa-slug',
                            'offer_on' => '',
                            'offer_off' => '',
                            'user_id' => 18]);

        Product::create(['presentation' => 'bolsa3',
                            'size' => '120mt',
                            'weight' => '29.2kg',
                            'measure' => '3mt',
                            'material' => 'cabulla3',
                            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                            'composition' => 'composition3',
                            'forms_employment' => 'forms employment3',
                            'price' => 180000,
                            'taxes' => 'taxes',
                            'available_quantity' => 15,
                            'image_scale' => '300',
                            'location' => 'UbicacionMaps',
                            'important_offer' => true,
                            'offer_price' => 120000,
                            'subcategory_id' => 2,
                            'name' => 'Inquifesa',
                            'slug' => 'inquifesa-slug',
                            'offer_on' => '',
                            'offer_off' => '',
                            'user_id' => 10]);
    }
}
