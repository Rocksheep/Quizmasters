<?php

namespace App\Http\Controllers;

use App\Events\UserJoinedRoom;
use App\Quiz;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function store()
    {
        $room = Quiz::firstOrFail()->createRoom();
        return $room;
    }

    public function join($joinCode)
    {
        $room = Room::findByJoinCodeOrFail($joinCode);
        $request = $this->validate(
            request(),
            [
                'name' => 'required'
            ]
        );

        event(new UserJoinedRoom($request['name'], $room));
    }
}
