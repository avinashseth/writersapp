<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $post_heading = $faker->sentence();
    return [
        'user_id' => 115, // for current user
        'post_heading' => $post_heading,
        'post_slug' => Str::slug($post_heading),
        'post_body' => $faker->text()
    ];
});
