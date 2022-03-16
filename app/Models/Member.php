<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'tb_member';
    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'tlp',
    ];

    public function transaki() {
        return $this->hasMany(Member::class);
    }

    public function penjemputan()
    {
        return $this->hasMany(Penjemputan::class);
    }
}
