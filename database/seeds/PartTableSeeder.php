<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parts')->insert([
            'name' => 'A',
            'created_at'=> Carbon::now(),
            'updated_at'=> now(),

        ]);
        DB::table('parts')->insert([
            'name' => 'B',
            'created_at'=> Carbon::now(),
            'updated_at'=> now(),

        ]);
        DB::table('parts')->insert([
            'name' => 'C',
            'created_at'=> Carbon::now(),
            'updated_at'=> now(),

        ]);
    }
}
