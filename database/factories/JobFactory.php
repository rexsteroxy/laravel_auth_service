<?php

use Faker\Generator as Faker;

$factory->define(App\Job::class, function (Faker $faker) {
    $admin_ids = DB::table('admins')->pluck('id')->all();
    return [
       'admin_id' => $faker->randomElement($admin_ids),
       'job_title'  => $faker->text(20),
       'description'  => $faker->text(70) ,
       'requirement' =>   $faker->text(40),
       'location' =>  $faker->city,
       'salary_range' => "20000 - 40000"
    ];
});
