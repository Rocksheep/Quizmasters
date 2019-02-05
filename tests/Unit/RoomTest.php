<?php

namespace Tests\Unit;

use App\Events\UserJoinedRoom;
use App\Room;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_its_own_url()
    {
        $room = new Room(['join_code' => 'randomcode']);
        $this->assertEquals(url('/rooms/randomcode'), $room->url());
    }

    /** @test */
    public function a_quiz_can_be_found_by_using_the_join_code()
    {
        $storedRoom = factory(Room::class)->create();
        $foundRoom = Room::findByJoinCodeOrFail($storedRoom->join_code);

        $this->assertEquals($storedRoom->id, $foundRoom->id);
    }

    /**
     * @test
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function it_throws_an_exception_when_the_quiz_cannot_be_found()
    {
        Room::findByJoinCodeOrFail('invalid_code');
    }
}
