<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0 ; $i < 100 ; $i++) {
            $heading = $faker->sentence($nbWords = 6, $variableNbWords = true);
            DB::table('posts')->insert([
                'user_id' => rand(1,100),
                'post_heading' => $heading,
                'post_slug' => Str::slug($heading),
                'post_body' => $faker->text(1000),
                'created_at' => $faker->dateTimeThisDecade($max = 'now', 'UTC'),
                'updated_at' => $faker->dateTimeThisDecade($max = 'now', 'UTC'),
            ]);
        }
    }
}
