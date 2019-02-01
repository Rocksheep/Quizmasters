<?php

namespace Tests\Feature;

use App\Quiz;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizzesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_receive_a_message_when_no_quizzes_are_available()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('No quizzes available');
    }

    /** @test */
    public function users_can_view_a_list_of_quizes()
    {
        $quiz = factory(Quiz::class)->create();

        $this->get('/')
            ->assertStatus(200)
            ->assertSee($quiz->name);
    }

    /** @test */
    public function a_user_can_view_a_quiz()
    {
        $this->withoutExceptionHandling();
        $quiz = factory(Quiz::class)->create();

        $this->get($quiz->url())
            ->assertStatus(200)
            ->assertSee('Welcome to ' . $quiz->name);
    }
}
