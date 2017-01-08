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
                'name' => '大專院校'
            ],
            [
                'name' => '臺灣地區'
            ],
            [
                'name' => '閒話家常'
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
        $area_boards = [
            [
                'slug' => 'taipei',
                'name' => '大台北區',
                'rule' => str_random(500),
                'board_category_id' => 2
            ],
            [
                'slug' => 'all',
                'name' => '桃園地區',
                'rule' => str_random(500),
                'board_category_id' => 2
            ]
        ];
        $normal_boards = [
            [
                'slug' => 'gossip',
                'name' => '八卦新聞',
                'rule' => str_random(500),
                'board_category_id' => 3
            ]
        ];
        DB::table('boards')->insert($school_boards);
        DB::table('boards')->insert($area_boards);
        DB::table('boards')->insert($normal_boards);


        $post_categories = [
            [
                'name' => '其他'
            ],
            [
                'name' => '聊天'
            ],
            [
                'name' => '情報'
            ],
            [
                'name' => '揪團'
            ],
            [
                'name' => '選課'
            ],
            [
                'name' => '打工'
            ]
        ];
        DB::table('post_categories')->insert($post_categories);

        // many to many
        $post_category = \App\PostCategory::find(1);
        $post_category->boards()->sync([1,2,3,4]);

        $board = \App\Board::find(1);
        $board->post_categories()->sync([1,2,3,4,5,6]);
    }
}
