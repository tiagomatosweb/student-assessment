<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTest extends TestCase
{
//    use WithFaker;
    use RefreshDatabase;
    /**
     * Get all questions
     *
     * @return void
     * @test
     */
    public function getAllQuestions()
    {
        factory(\App\Question::class, 3)->create();
        $response = $this->json('GET', '/api/questions');
        $response->assertStatus(200);
        $result = json_decode($response->content(), true);
        $this->assertTrue(is_array($result));
        $this->assertTrue(!empty($result));
        $this->assertTrue(true);
    }

    /**
     * Get a single questions
     * @return void
     * @test
     */
    public function getSingleQuestion()
    {
        factory(\App\Question::class)->create();
        $response = $this->json('GET', '/api/questions/1');
        $response->assertStatus(200);
        $result = json_decode($response->content(), true);
        $this->assertEquals($result['id'], 1);
        $this->assertTrue(is_array($result));
        $this->assertTrue(!empty($result));
        $this->assertTrue(isset($result['options']));
        $this->assertTrue(true);
    }
}
