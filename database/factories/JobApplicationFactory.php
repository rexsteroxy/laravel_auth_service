<?php

use Faker\Generator as Faker;

$factory->define(App\JobApplication::class, function (Faker $faker) {
    $user_ids = DB::table('users')->pluck('id')->all();
    $job_ids = DB::table('jobs')->pluck('id')->all();
    return [
        'user_id' => $faker->randomElement($user_ids),
        'job_id' => $faker->randomElement($job_ids),
        'cv' =>'gJpNTovXSs8zRQG2qNyJ9jpO7ZHA2ax2fwGwVQsE.pdf'
    ];
});

