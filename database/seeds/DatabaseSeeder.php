<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Admin::class, 5)->create();
        factory(App\Job::class, 8)->create();
        factory(App\User::class, 5)->create();
        factory(App\JobApplication::class, 5)->create();
       
        
    }
}
