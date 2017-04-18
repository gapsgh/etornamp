<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(CompanyTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         $this->call(Phone_NumberTableSeeder::class);
         $this->call(EmailTableSeeder::class);
         $this->call(Product_ImageTableSeeder::class);
         $this->call(Product_RatingTableSeeder::class);
         $this->call(Map_LocationTableSeeder::class);
    }
}
