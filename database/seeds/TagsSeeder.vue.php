<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
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
        $tags = ['php', 'java', 'js', 'python', 'go', 'c++', 'c#', 'VueJs', 'JavaScript', 'React', 'Angular'];
        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
