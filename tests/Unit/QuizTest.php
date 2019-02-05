<?php

namespace Tests\Unit;

use App\Quiz;
use App\Room;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_room()
    {
        $quiz = factory(Quiz::class)->create();
        $room = $quiz->createRoom();

        $this->assertInstanceOf(Room::class, $room);
        $this->assertNotNull($room->join_code);
    }

    /** @test */
    public function it_can_have_multiple_rooms()
    {
        $quiz = factory(Quiz::class)->create();
        $this->assertEquals(0, $quiz->rooms()->count());

        $quiz->createRoom();
        $this->assertEquals(1, $quiz->rooms()->count());

        $quiz->createRoom();
        $this->assertEquals(2, $quiz->rooms()->count());
    }
}
