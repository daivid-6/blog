<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article')->insert([
            'id'=>1,
            'user_id'=>2,
            'name'=>'php'
        ],[
            'id'=>2,
            'user_id'=>2,
            'name'=>'phpunit'
        ],[
            'id'=>3,
            'user_id'=>3,
            'name'=>'python'
        ],[
            'id'=>4,
            'user_id'=>5,
            'name'=>'java'
        ],[
            'id'=>5,
            'user_id'=>5,
            'name'=>'git'
        ]);
    }
}
