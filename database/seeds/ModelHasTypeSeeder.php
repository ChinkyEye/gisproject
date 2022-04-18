<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ModelHasTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_types')->insert([
           'model' => 'none',
           'type' => 'none',
           'is_active' => '1',
           'date_np' => date('Y-m-d'),
           'date' => date('Y-m-d'),
           'time' => date('H:i:s'),
           'created_by' => '1',
        ]);
    }
}
