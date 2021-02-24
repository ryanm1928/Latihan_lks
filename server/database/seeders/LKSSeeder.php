<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LKSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('divisions')->insert([
            [
                "name"     =>   "IT"
            ],
            [
                "name"     =>   "Payment"
            ],
            [
                "name"     =>   "Procurement"
            ],
            [
                "name"     =>   "Finance"
            ],
        ]);

        DB::table('users')->insert([
            [
                "username"      =>  "admin20",
                "password"      =>  bcrypt("admin"),
                "role"          =>  "admin",
                "division_id"   =>  1,
            ],
            [
                "username"      =>  "user1",
                "password"      =>  bcrypt("user"),
                "role"          =>  "user",
                "division_id"   =>  2,
            ],
            [
                "username"      =>  "user2",
                "password"      =>  bcrypt("user"),
                "role"          =>  "user",
                "division_id"   =>  2,
            ],
            [
                "username"      =>  "user3",
                "password"      =>  bcrypt("user"),
                "role"          =>  "user",
                "division_id"   =>  3,
            ],
            [
                "username"      =>  "user3",
                "password"      =>  bcrypt("user"),
                "role"          =>  "user",
                "division_id"   =>  4,
            ],
        ]);
    }
}
