<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = [1, 2, 3, 6, 8, 9];

        for ($i = 0; $i < 10; $i++) {
          DB::table('posts')->insert([
            'title' => Str::random(),
            'description' => Str::random(33),
            'user_id' => $userIds[array_rand($userIds)],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]);
        }
      }
}
