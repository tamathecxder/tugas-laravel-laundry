<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'tb_transaksi';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function outlet() {
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }

    public function member() {
        return $this->belongsTo(Member::class, 'id_member', 'id');
    }

}
