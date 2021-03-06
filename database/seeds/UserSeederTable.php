<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => $faker->dateTimeThisDecade($max = 'now', 'UTC'),
                'password' => bcrypt('123456'),
                'created_at' => $faker->dateTimeThisDecade($max = 'now', 'UTC'),
                'updated_at' => $faker->dateTimeThisDecade($max = 'now', 'UTC'),
            ]);
        }
    }
}
