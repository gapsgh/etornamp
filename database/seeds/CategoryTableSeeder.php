<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CategoryTableSeeder extends Seeder
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
        DB::table('categories')->truncate();

        $faker = Faker::create();
        $categories = [
        	['id'=>1, 
        	 'name'=>'Food', 
        	 'level'=>1, 
        	 'parent_id'=>1, 
        	 'order_index'=>1, 
        	 'created_at' => new DateTime, 
        	 'updated_at' => new DateTime,
        	 ] ,
        	 ['id'=>2, 
        	 'name'=>'Can foods', 
        	 'level'=>2, 
        	 'parent_id'=>1, 
        	 'order_index'=>1, 
        	 'created_at' => new DateTime, 
        	 'updated_at' => new DateTime,
        	 ] ,
        	 ['id'=>3, 
        	 'name'=>'Drinks', 
        	 'level'=>2, 
        	 'parent_id'=>1, 
        	 'order_index'=>1, 
        	 'created_at' => new DateTime, 
        	 'updated_at' => new DateTime,
        	 ] ,
        	 ['id'=>4, 
        	 'name'=>'Raw Material', 
        	 'level'=>2, 
        	 'parent_id'=>1, 
        	 'order_index'=>1, 
        	 'created_at' => new DateTime, 
        	 'updated_at' => new DateTime,
        	 ] ,
        	 ['id'=>5, 
        	 'name'=>'Fashion', 
        	 'level'=>1, 
        	 'parent_id'=>5, 
        	 'order_index'=>1, 
        	 'created_at' => new DateTime, 
        	 'updated_at' => new DateTime,
        	 ] ,
        	 ['id'=>6, 
        	 'name'=>'Clothing', 
        	 'level'=>2, 
        	 'parent_id'=>5, 
        	 'order_index'=>1, 
        	 'created_at' => new DateTime, 
        	 'updated_at' => new DateTime,
        	 ] ,
        	 ['id'=>7, 
        	 'name'=>'Bags', 
        	 'level'=>2, 
        	 'parent_id'=>5, 
        	 'order_index'=>1, 
        	 'created_at' => new DateTime, 
        	 'updated_at' => new DateTime,
        	 ] ,
        	 ['id'=>8, 
        	 'name'=>'Shoes', 
        	 'level'=>2, 
        	 'parent_id'=>5, 
        	 'order_index'=>1, 
        	 'created_at' => new DateTime, 
        	 'updated_at' => new DateTime,
        	 ] ,

        ];

        
        DB::table('categories')->insert($categories);
    }
}
