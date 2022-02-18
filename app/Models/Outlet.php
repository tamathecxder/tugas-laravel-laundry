<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    public $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'tb_outlet';
    protected $fillable = [
        'nama',
        'alamat',
        'tlp',
    ];

    public function paket() {
        return $this->hasMany(Paket::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }


}
