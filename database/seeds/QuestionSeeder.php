<?php

use App\Question;
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
        Question::truncate();
        $now = date("Y-m-d H:i:s");
        DB::table("questions")->insert([
            ['title' => 'Acre'],
        ]);
    }
}
