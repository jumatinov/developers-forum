<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        if (count(User::all()) === 0) {
            $alla = User::create([
                'name' => 'Алла',
                'surname' => 'Цай',
                'password' => '123456',
                'email' => 'superadmin@admin.com',
                'username' => 'alla08',
            ]);
            $alla->generateApiToken();
            $ruslan = User::create([
                'name' => 'Руслан',
                'surname' => 'Джуматинов',
                'password' => '123456',
                'email' => 'jumatinov@gmail.com',
                'username' => 'jumatinov',
            ]);
            $ruslan->generateApiToken();
        }
    }
}
