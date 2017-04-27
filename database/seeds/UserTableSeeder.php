<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
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
        DB::table('users')->truncate();

        $faker = Faker::create();
        $users = [];

        foreach (range(1,20) as $key => $value) {
        	# code...
        	$users[] = [
                'name' => $faker->name,
        		'email' => $faker->email,
        		'password' => $faker->password,
        		'created_at' => new DateTime,
        		'updated_at' => new DateTime,
        	];
        }
        DB::table('users')->insert($users);
    }
}
