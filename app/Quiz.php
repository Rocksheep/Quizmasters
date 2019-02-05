<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string join_code
 */
class Quiz extends Model
{
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function createRoom()
    {
        do {
            $joinCode = str_random(8);
        } while (Room::where('join_code', $joinCode)->first() !== null);

        return $this->rooms()->create(['join_code' => $joinCode]);
    }
}
