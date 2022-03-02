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
    // protected $fillable = [
    //     'id_outlet',
    //     'kode_invoice',
    //     'id_member',
    //     'tgl',
    //     'biaya_tambahan',
    //     'batas_waktu',
    //     'diskon',
    //     'pajak',
    //     'status',
    //     'pembayaran',
    //     'id_user',
    // ];

    public function outlet() {
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }

    public function member() {
        return $this->belongsTo(Member::class, 'id_member', 'id');
    }

}
