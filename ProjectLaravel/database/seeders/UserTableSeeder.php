<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                "username"  =>  "rpl",
                "role"      =>  "admin",
                "password"  =>  bcrypt("root"),
                "division_id"   => 2,
            ],
            [
                "username"  =>  "titl",
                "role"      =>  "user",
                "password"  =>  bcrypt("root"),
                "division_id"   =>  1,
            ],
            [
                "username"  =>  "tkj",
                "role"      =>  "user",
                "password"  =>  bcrypt("root"),
                "division_id"   =>  1,
            ],
            [
                "username" => "tkr",
                "role" => "user",
                "password" => bcrypt("root"),
                "division_id" => 1

            ],
            [
                "username" => "tav",
                "role" => "user",
                "password" => bcrypt("root"),
                "division_id" => 1

            ]
        ]);
    }
}
