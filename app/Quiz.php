<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string join_code
 */
class Quiz extends Model
{
    protected $fillable = ['join_code'];

    public static function findByJoinCodeOrFail($code)
    {
        return self::where('join_code', $code)->firstOrFail();
    }

    public function url()
    {
        return url("/{$this->join_code}");
    }
}
