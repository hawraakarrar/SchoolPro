<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'name' => 'First',
            'created_at'=> Carbon::now(),
            'updated_at'=> now(),

        ]);
        DB::table('levels')->insert([
            'name' => 'Secound',
            'created_at'=> Carbon::now(),
            'updated_at'=> now(),

        ]);
        DB::table('levels')->insert([
            'name' => 'Third',
            'created_at'=> Carbon::now(),
            'updated_at'=> now(),

        ]);
    }
}
