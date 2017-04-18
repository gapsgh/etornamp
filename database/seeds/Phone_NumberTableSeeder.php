<?php

use Illuminate\Database\Seeder;

class Phone_NumberTableSeeder extends Seeder
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
        DB::table('phone_numbers')->truncate();

        $faker = Faker\Factory::create();
        $phone_numbers = [];

        foreach (range(1,30) as $key => $value) {
        	# code...
        	$phone_numbers[] = [
        		'number' => $faker->phoneNumber(),
        		'priority' => 1,
        		'company_id' => rand(1,20),
        		'created_at' => new DateTime,
        		'updated_at' => new DateTime,
        	];
        }
        DB::table('phone_numbers')->insert($phone_numbers);
    }
}
