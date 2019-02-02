<?php

namespace Tests\Unit;

use App\Events\UserJoinedQuiz;
use App\Quiz;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_its_own_url()
    {
        $quiz = new Quiz(['join_code' => 'randomcode']);
        $this->assertEquals(url('/randomcode'), $quiz->url());
    }

    /** @test */
    public function a_quiz_can_be_found_by_using_the_join_code()
    {
        $storedQuiz = factory(Quiz::class)->create();
        $foundQuiz = Quiz::findByJoinCodeOrFail($storedQuiz->join_code);

        $this->assertEquals($storedQuiz->id, $foundQuiz->id);
    }

    /**
     * @test
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function it_throws_an_exception_when_the_quiz_cannot_be_found()
    {
        Quiz::findByJoinCodeOrFail('invalid_code');
    }
}
