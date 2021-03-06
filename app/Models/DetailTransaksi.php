<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    public $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'tb_detail_transaksi';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function paket() {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    public function transaksi() {
        return $this->belongsTo(Transaksi::class);
    }
}
