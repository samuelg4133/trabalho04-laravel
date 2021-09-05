<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            "firstname" => "SAMUEL",
            "lastname" => "GOMES VIEIRA",
            "birth_date" => "1999-05-29",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "role_id" => 2,
        ]);
    }
}
