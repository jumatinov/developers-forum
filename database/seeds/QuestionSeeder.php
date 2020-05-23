<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tags')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $datas = [
            [
                'title' => 'Title',
                'question' => 'I have problem with my js can you help me',
                'user_id' => 1,
            ]
        ];
        foreach ($datas as $data) {
            \App\Question::create($data);
        }
    }
}
