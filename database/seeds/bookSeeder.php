<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class bookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => Str::random(10),
            'price' => rand(1, 100)
        ]);



        //
    }
}
