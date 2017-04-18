<?php

use Illuminate\Database\Seeder;

class Product_ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('product_images')->truncate();

        $faker = Faker\Factory::create();
        $product_images = [];

        foreach (range(1,300) as $key => $value) {
        	# code...
        	$product_images[] = [
        		'image' => $faker->numberBetween(1185465,889564563).".jpg",
        		'priority' => 1,
        		'product_id' => rand(1,200),
        		'created_at' => new DateTime,
        		'updated_at' => new DateTime,
        	];
        }
        DB::table('product_images')->insert($product_images);
    }
}
