<?php

use App\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Question::truncate();
            DB::table("questions")->insert([
                ['title' => 'Question A'],
                ['title' => 'Question B'],
                ['title' => 'Question C'],
                ['title' => 'Question D'],
                ['title' => 'Question E'],
                ['title' => 'Question F'],
                ['title' => 'Question G'],
                ['title' => 'Question H'],
            ]);
            DB::table("options")->insert([
                ['question_id' => 1, 'title' => 'Option A', 'is_correct' => true],
                ['question_id' => 1, 'title' => 'Option B', 'is_correct' => false],
                ['question_id' => 1, 'title' => 'Option C', 'is_correct' => false],
                ['question_id' => 2, 'title' => 'Option A', 'is_correct' => true],
                ['question_id' => 2, 'title' => 'Option B', 'is_correct' => false],
                ['question_id' => 2, 'title' => 'Option C', 'is_correct' => false],
                ['question_id' => 3, 'title' => 'Option A', 'is_correct' => true],
                ['question_id' => 3, 'title' => 'Option B', 'is_correct' => false],
                ['question_id' => 3, 'title' => 'Option C', 'is_correct' => false],
                ['question_id' => 4, 'title' => 'Option A', 'is_correct' => true],
                ['question_id' => 4, 'title' => 'Option B', 'is_correct' => false],
                ['question_id' => 4, 'title' => 'Option C', 'is_correct' => false],
                ['question_id' => 5, 'title' => 'Option A', 'is_correct' => true],
                ['question_id' => 5, 'title' => 'Option B', 'is_correct' => false],
                ['question_id' => 5, 'title' => 'Option C', 'is_correct' => false],
                ['question_id' => 6, 'title' => 'Option A', 'is_correct' => true],
                ['question_id' => 6, 'title' => 'Option B', 'is_correct' => false],
                ['question_id' => 6, 'title' => 'Option C', 'is_correct' => false],
                ['question_id' => 7, 'title' => 'Option A', 'is_correct' => true],
                ['question_id' => 7, 'title' => 'Option B', 'is_correct' => false],
                ['question_id' => 7, 'title' => 'Option C', 'is_correct' => false],
                ['question_id' => 8, 'title' => 'Option A', 'is_correct' => true],
                ['question_id' => 8, 'title' => 'Option B', 'is_correct' => false],
                ['question_id' => 8, 'title' => 'Option C', 'is_correct' => false],
            ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
