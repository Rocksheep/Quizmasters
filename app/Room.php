<?php
/**
 * Created by PhpStorm.
 * User: rienvanvelzen
 * Date: 2019-02-05
 * Time: 20:22
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed join_code
 */
class Room extends Model
{
    protected $hidden = ['quiz_id', 'id'];
    protected $fillable = ['join_code'];

    public static function findByJoinCodeOrFail($code)
    {
        return self::where('join_code', $code)->firstOrFail();
    }

    public function url()
    {
        return url("/rooms/{$this->join_code}");
    }
}