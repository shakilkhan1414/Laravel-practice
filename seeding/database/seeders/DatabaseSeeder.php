<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::table('users')->truncate();
        // DB::table('posts')->truncate();
        \App\Models\User::factory()->count(10)->create();
        // \App\Models\User::factory()->count(10)->create()->each(function($user){
        //     $user->posts()->save(\App\Models\User::factory()->make());
        // });
        // $this->call(UsersTableSeeder::class);
    }
}
