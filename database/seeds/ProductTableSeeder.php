<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
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
        DB::table('products')->truncate();

        $faker = Faker\Factory::create();
        $products = [];

        foreach (range(1,200) as $key => $value) {
        	# code...
        	$cats = [2,3,4,6,7,8];
        	$products[] = [
        		'name' => "Product ".$key,
        		'single_price' => $faker->numberBetween(1,5000),
        		'bulk_price' => $faker->numberBetween(1000,80000),
        		'bonus_percentage' => rand(1,20),
        		'active_status' => 1,
        		'category_id' => $cats[array_rand($cats)],
        		'company_id' => rand(1,20),
        		'certification_status' => rand(0,1),
        		'created_at' => new DateTime,
        		'updated_at' => new DateTime,
        	];
        }
        DB::table('products')->insert($products);
    }
}
