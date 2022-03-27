<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogDB extends Model
{
    use HasFactory;

    protected $table = 'logs';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $primaryKey = 'id';

    public static function record($user_id = null, $event, $extra = null)
    {
        return static::create([
            'user_id' => is_null($user_id) ? null : $user_id->id,
            'ip' => request()->ip(),
            'event' => $event,
            'extra' => $extra
        ]);
    }
}
