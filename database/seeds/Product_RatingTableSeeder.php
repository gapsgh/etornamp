<?php

use Illuminate\Database\Seeder;

class Product_RatingTableSeeder extends Seeder
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
        DB::table('product_ratings')->truncate();

        $faker = Faker\Factory::create();
        $product_ratings = [];

        foreach (range(1,300) as $key => $value) {
        	# code...
        	$product_ratings[] = [
        		'rate' => rand(1,5),
        		'product_id' => rand(1,200),
        		'created_at' => new DateTime,
        		'updated_at' => new DateTime,
        	];
        }
        DB::table('product_ratings')->insert($product_ratings);
    }
}
