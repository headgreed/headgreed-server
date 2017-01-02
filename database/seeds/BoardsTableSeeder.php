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
        $board_categories = [
            [
                'name' => '很多學校'
            ],
            [
                'name' => '現實人生'
            ],
            [
                'name' => '閒話家常'
            ],
            [
                'name' => '女性話題'
            ],
            [
                'name' => '成人話題'
            ]
        ];
        DB::table('board_categories')->insert($board_categories);

        $school_boards = [
            [
                'slug' => 'ncu',
                'name' => '中央大學',
                'rule' => str_random(500),
                'board_category_id' => 1
            ]
        ];
        $normal_boards = [
            [
                'slug' => 'plan',
                'name' => '人生規劃',
                'rule' => str_random(500),
                'board_category_id' => 2
            ],
            [
                'slug' => 'all',
                'name' => '什麼都可',
                'rule' => str_random(500),
                'board_category_id' => 3
            ],
            [
                'slug' => 'joke',
                'name' => '有趣搞笑',
                'rule' => str_random(500),
                'board_category_id' => 3
            ],
            [
                'slug' => 'makeup',
                'name' => '美妝美妝',
                'rule' => str_random(500),
                'board_category_id' => 4
            ]
        ];
        $adult_boards = [
            [
                'slug' => 'sex',
                'name' => '成人綜合',
                'rule' => str_random(500),
                'board_category_id' => 5
            ]
        ];
        DB::table('boards')->insert($school_boards);
        DB::table('boards')->insert($normal_boards);
        DB::table('boards')->insert($adult_boards);
    }
}
