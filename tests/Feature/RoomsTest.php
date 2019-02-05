<?php

namespace Tests\Feature;

use App\Events\UserJoinedRoom;
use App\Quiz;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->quiz = factory(Quiz::class)->create();
    }

    /** @test */
    public function a_user_can_create_a_new_room()
    {
        $this->withoutExceptionHandling();

        $this->post('/rooms')
            ->assertStatus(201)
            ->assertJsonStructure([
                'join_code'
            ]);
    }

    /** @test */
    public function a_user_can_join_a_room()
    {
        $this->withoutExceptionHandling();
        Event::fake();

        $room = $this->quiz->createRoom();
        $this->post($room->url(), ['name' => 'John Doe'])
            ->assertStatus(200);

        Event::assertDispatched(UserJoinedRoom::class);
    }
}
