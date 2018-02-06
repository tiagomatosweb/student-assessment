<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Get all questions
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $questions = Question::all();

        $questions = $questions->map(function($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'options' => $item->options
            ];
        });

        return $questions;
    }

    /**
     * Get a single question
     * @param $id
     * @return mixed
     */
    public function getQuestion($id)
    {
        $q = Question::findOrFail($id);
        $opt = $q->options;
        $opt = $opt->map(function($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'question_id' => $item->question_id,
            ];
        });

        return [
            'id' => $q->id,
            'title' => $q->title,
            'options' => $opt,
        ];
    }


    /**
     * Check question answer
     * @param $id
     */
    public function answerQuestion($id)
    {
        $q = Question::findOrFail($id);
        $answerId = request()->option;

        $isAnswerCorrect = $this->checkAnswer($q, $answerId);

        return $this->getNextQuestion($q->id, $isAnswerCorrect);
    }

    /**
     * Check whether the answer is correct or not
     * @param Question $q
     * @param string $answerId
     * @return bool
     */
    private function checkAnswer(Question $q, $answerId = '')
    {
        $options = $q->options;
        $correctAnswer = $options->first(function($item) {
            return $item->is_correct;
        });

        if ($correctAnswer->id == $answerId) {
            return true;
        }

        return false;
    }

    /**
     * Get next question based on the current question answer
     * @param Question $question
     */
    private function getNextQuestion($qId, $isCorrect)
    {
        $nextQuestionId = 0;
        if ($qId == 1) {
            $nextQuestionId = 3;
            if (!$isCorrect) {
                $nextQuestionId = 2;
            }
        } else if ($qId == 2) {
                $nextQuestionId = 4;
        } else if ($qId == 3) {
            $nextQuestionId = 5;
            if (!$isCorrect) {
                $nextQuestionId = 6;
            }
        } else if ($qId == 4) {
            $nextQuestionId = 3;
        } else if ($qId == 5) {
            $nextQuestionId = 7;
        } else if ($qId == 6) {
            $nextQuestionId = 8;
        } else if ($qId == 7) {
            $nextQuestionId = '';
        } else if ($qId == 8) {
            $nextQuestionId = 7;
            if (!$isCorrect) {
                $nextQuestionId = '';
            }
        }
        return !empty($nextQuestionId) ? $this->getQuestion($nextQuestionId) : '';
    }
}
