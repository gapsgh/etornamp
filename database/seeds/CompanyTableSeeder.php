<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
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
        DB::table('companies')->truncate();

        $faker = Faker\Factory::create();
        $companies = [];

        foreach (range(1,20) as $key => $value) {
        	# code...
        	$companies[] = [
        		'name' => $faker->company,
        		'registration_number' => str_random(10),
        		'address' => $faker->address,
        		'user_id' => rand(1,20),
        		'logo' => str_random(3).".jpg",
        		'working_hours' => "From : ".rand(6,9)."AM To : ".rand(5,10)."PM",
        		'created_at' => new DateTime,
        		'updated_at' => new DateTime,
        	];
        }
        DB::table('companies')->insert($companies);
    }
}
