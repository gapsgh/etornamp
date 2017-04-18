<?php

use Illuminate\Database\Seeder;

class EmailTableSeeder extends Seeder
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
        DB::table('emails')->truncate();

        $faker = Faker\Factory::create();
        $emails = [];

        foreach (range(1,30) as $key => $value) {
        	# code...
        	$emails[] = [
        		'email' => $faker->email,
        		'priority' => 1,
        		'company_id' => rand(1,20),
        		'created_at' => new DateTime,
        		'updated_at' => new DateTime,
        	];
        }
        DB::table('emails')->insert($emails);
        
    }
}
