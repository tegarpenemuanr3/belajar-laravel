<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EdulevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //one data
        // DB::table('edulevels')->insert([
        //     'name' => 'SD',
        //     'desc' => 'SD/MI'
        // ]);

        //multiple manual
        DB::table('edulevels')->insert([
            [
                'name' => 'SD',
                'desc' => 'SD/MI'
            ],
            [
                'name' => 'SMP',
                'desc' => 'SMP/MTs'
            ],
            [
                'name' => 'SMA',
                'desc' => 'SMA/SMK'
            ],
        ]);
    }
}
