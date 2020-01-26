<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'hawraa.karrar.alum@uoitc.edu.iq',
            'password' => hash::make('1234'),
            'name' => 'hawraa',
            'role' => 1,
            'remember_token' =>Str::random(10),
            'created_at'=> Carbon::now(),
            'updated_at'=> now(),

        ]);
    }
}
