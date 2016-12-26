<?php

use Illuminate\Database\Seeder;

class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school_boards = [
            [
                'slug' => 'ncu',
                'name' => '中央大學',
                'rule' => str_random(500),
                'is_school' => true
            ]
        ];
        $normal_boards = [
            [
                'slug' => 'all',
                'name' => '什麼都可',
                'rule' => str_random(500)
            ],
            [
                'slug' => 'joke',
                'name' => '有趣搞笑',
                'rule' => str_random(500)
            ]
        ];
        $adult_boards = [
            [
                'slug' => 'sex',
                'name' => '西斯綜合',
                'rule' => str_random(500),
                'is_adult' => true
            ]
        ];
        DB::table('boards')->insert($school_boards);
        DB::table('boards')->insert($normal_boards);
        DB::table('boards')->insert($adult_boards);
    }
}
