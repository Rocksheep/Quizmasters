<?php

namespace App\Events;

use App\Quiz;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserJoinedQuiz implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var string  */
    private $username;

    /** @var Quiz  */
    private $quiz;

    /**
     * Create a new event instance.
     *
     * @param string $username
     * @param Quiz $quiz
     */
    public function __construct($username, Quiz $quiz)
    {
        $this->username = $username;
        $this->quiz = $quiz;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('quiz.' . $this->quiz->join_code);
    }
}
