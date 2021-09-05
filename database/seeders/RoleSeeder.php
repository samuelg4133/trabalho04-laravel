<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert(
            array(
                [
                    "name" => 'ADMINISTRADOR',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),               ],
                [
                    "name" => 'TÉCNICO EM INFORMÁTICA',
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ],
                [
                    "name" => "GERENTE DE RELACIONAMENTO",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ]
            ),
        );
    }
}
