<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class resultSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('results')->insert([
            'grade' => array_rand(['A','B','C','D','E','F']),
            'session'=> 2022,
            'matric_no'=> 'UJ/2014/NS/004',
            'file_id'=>1,
            'course_id' =>rand(0,9),
        ]);

    }
}
