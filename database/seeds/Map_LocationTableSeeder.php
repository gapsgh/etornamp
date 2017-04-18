<?php

use Illuminate\Database\Seeder;

class Map_LocationTableSeeder extends Seeder
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
        DB::table('map_locations')->truncate();

        $faker = Faker\Factory::create();
        $map_locations = [];

        foreach (range(1,20) as $key => $value) {
        	# code...
        	$map_locations[] = [
        		'company_id' => $key,
        		'lon' => mt_rand(100000, 999999),
        		'lat' => mt_rand(100000, 999999),
        		'created_at' => new DateTime,
        		'updated_at' => new DateTime,
        	];
        }
        DB::table('map_locations')->insert($map_locations);
    }
}
