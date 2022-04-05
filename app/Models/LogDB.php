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

    /**
     * fungsi record untuk mensetting log dan fungsi ini juga dapat dipanggil di luar class untuk dijadikan logging dari aplikasi
     */
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
